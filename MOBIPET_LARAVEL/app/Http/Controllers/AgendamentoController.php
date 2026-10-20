<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Pet;
use App\Models\Servico;
use App\Models\Funcionario;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class AgendamentoController extends Controller
{

public function resetar($id)
{
    $agendamento = Agendamento::findOrFail($id);

    $agendamento->definirStatus('Pendente');

    return redirect()
        ->route('painel-controle')
        ->with('success', 'Agendamento resetado com sucesso!');
}
    
    /**
     * Mapeia o texto livre salvo em status_agendamento para as chaves
     * que o Blade/CSS reconhecem: agendado | andamento | concluido | cancelado.
     */
    private const STATUS_MAP = [
        'pendente'       => 'agendado',
        'agendado'       => 'agendado',
        'confirmado'     => 'agendado',
        'em andamento'   => 'andamento',
        'andamento'      => 'andamento',
        'em atendimento' => 'andamento',
        'banho'          => 'andamento', // legado: status antigo antes do rename para "Em atendimento"
        'concluido'      => 'concluido',
        'finalizado'     => 'concluido',
        'cancelado'      => 'cancelado',
    ];

    

    public function index()
    {
        $agendamentos = Agendamento::all();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        if (!session()->has('id')) {
            return redirect()->route('login');
        }

        $clienteId = Session::get('id');
        $pets = Pet::where('fk_id_cliente', $clienteId)->get();
        $funcionarios = Funcionario::all();
        $servicos = Servico::all();

        return view('agendamentos.create', compact('pets', 'funcionarios', 'servicos'));
    }

    public function store(Request $request)
    {
        // Normaliza para HH:MM antes de validar (o <select> já envia nesse formato,
        // mas evita que "09:30:00" ou espaços furem a regra do Rule::in).
        $request->merge([
            'horario' => substr(trim((string) $request->input('horario')), 0, 5),
        ]);

        $request->validate([
            'fk_id_pet' => 'required|exists:Pet,id_pet',
            'fk_id_servico' => 'required|exists:Servico,id_servico',
            'fk_id_funcionario' => 'required|exists:Funcionario,id_funcionario',
            'data_agendamento' => 'required|date',
            'horario' => ['required', Rule::in(Agendamento::horariosDisponiveis())],
            'observacoes' => 'required'
        ], [
            'horario.in' => 'Escolha um horário entre 07:00 e 18:00, de 30 em 30 minutos.',
        ]);

        // Não permite agendar para uma data anterior à data atual.
        $dataAgendamento = Carbon::parse($request->data_agendamento)->startOfDay();

        if ($dataAgendamento->lt(Carbon::today())) {
            return back()
                ->withInput()
                ->withErrors(['data_agendamento' => 'A data do agendamento não pode ser anterior à data atual.']);
        }

        // Se o agendamento for para hoje, o horário não pode já ter passado.
        if ($dataAgendamento->isToday()) {
            $horarioEscolhido = Carbon::today()->setTimeFromTimeString($request->horario);

            if ($horarioEscolhido->lte(Carbon::now())) {
                return back()
                    ->withInput()
                    ->withErrors(['horario' => 'Escolha um horário que ainda não passou no dia de hoje.']);
            }
        }

        // Verificação de conflito: o mesmo profissional não pode ter dois
        // agendamentos ativos na mesma data e horário (agendamentos cancelados
        // liberam a vaga).
        if (Agendamento::horarioOcupado($request->fk_id_funcionario, $request->data_agendamento, $request->horario)) {
            return back()
                ->withInput()
                ->withErrors(['horario' => 'Este profissional já tem um agendamento nesta data e horário. Escolha outro horário.']);
        }

        Agendamento::create([
            'data_agendamento' => $request->data_agendamento,
            'horario' => $request->horario,
            'status_agendamento' => 'Pendente',

            'fk_id_pet' => $request->fk_id_pet,
            'fk_id_servico' => $request->fk_id_servico,
            'fk_id_funcionario' => $request->fk_id_funcionario,
            'observacao' => $request->observacoes
        ]);

        return redirect()
            ->route('agendamento')
            ->with('success', 'Agendamento confirmado!');
    }

    /**
     * (AJAX) Lista os horários da agenda para um profissional numa data,
     * marcando quais já estão ocupados ou já passaram. Alimenta a grade
     * de horários da tela de agendamento.
     */
    public function horarios(Request $request)
    {
        if (!session()->has('id')) {
            return response()->json(['message' => 'Sessão expirada.'], 401);
        }

        $dados = $request->validate([
            'funcionario' => 'required|exists:Funcionario,id_funcionario',
            'data'        => 'required|date',
        ]);

        // Mesma grade usada pela API do app mobile (Agendamento::gradeHorarios).
        $horarios = Agendamento::gradeHorarios($dados['funcionario'], Carbon::parse($dados['data']));

        return response()->json(['horarios' => $horarios]);
    }

    public function show($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        return view('agendamentos.show', compact('agendamento'));
    }

    public function edit($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        return view('agendamentos.edit', compact('agendamento'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_tutor' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefone' => 'required|string|max:20',
            'nome_pet' => 'required|string|max:255',
            'tipo_pet' => 'required|string|max:100',
            'profissional' => 'required|string|max:255',
            'servico' => 'required|string|max:255',
            'data' => 'required|date',
            'hora' => 'required',
        ]);

        $agendamento = Agendamento::findOrFail($id);
        $agendamento->update($request->all());
        return redirect()->route('agendamento')->with('success', 'Agendamento atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $agendamento->delete();
        return redirect()->route('agendamento')->with('success', 'Agendamento excluído com sucesso!');
    }

    /**
     * Tela de agenda no estilo "Calendário do iPhone" (mês > dia > agendamentos)
     * para uso do funcionário.
     */
    public function agendamentosFuncionario()
    {
        if(!session()->has('id') || !in_array(session('nivel_acesso'), ['FUNCIONARIO', 'ADMIN'], true))
        {
            return redirect()->route('login.funcionario');
        }

        $agendamentos = Agendamento::with([
            'pet.cliente',
            'servico',
            'funcionario',
            'servicoEtapaAtual',
        ])
        ->whereNotNull('data_agendamento')
        ->orderBy('data_agendamento')
        ->orderBy('horario')
        ->get();

        // Lista simples: o calendário da view agrupa por mês/dia e aplica os
        // filtros (status, profissional, busca) no navegador.
        $eventos = $agendamentos->map(fn (Agendamento $ag) => [
            'id'             => $ag->id_agendamento,
            'data'           => Carbon::parse($ag->data_agendamento)->format('Y-m-d'),
            'horario'        => $ag->horario ? Carbon::parse($ag->horario)->format('H:i') : '--:--',
            'pet'            => $ag->pet->nome ?? 'Pet não informado',
            'especie'        => $ag->pet->especie ?? '',
            'tutor'          => $ag->pet->cliente->nome ?? 'Tutor não informado',
            'servico'        => $ag->servico->nome ?? 'Serviço não informado',
            'funcionario'    => $ag->funcionario->nome ?? 'Não atribuído',
            'id_funcionario' => $ag->fk_id_funcionario,
            'status'         => $this->normalizarStatus($ag->status_agendamento),
            'etapa'          => $ag->status_agendamento === 'Em atendimento' ? $ag->servicoEtapaAtual?->label() : null,
            'observacao'     => $ag->observacao,
        ])->values();

        $funcionarios = Funcionario::orderBy('nome')->get(['id_funcionario', 'nome']);

        return view(
            'funcionario.agendamentos',
            compact('eventos', 'funcionarios')
        );
    }

    /**
     * Normaliza o texto de status_agendamento (minúsculo, sem acento) e
     * mapeia para as chaves usadas pelos badges do Blade.
     */
    private function normalizarStatus(?string $status): string
    {
        if (!$status) {
            return 'agendado';
        }

        $normalizado = strtolower(trim($status));
        $normalizado = str_replace(
            ['á', 'ã', 'â', 'é', 'ê', 'í', 'ó', 'ô', 'õ', 'ú', 'ç'],
            ['a', 'a', 'a', 'e', 'e', 'i', 'o', 'o', 'o', 'u', 'c'],
            $normalizado
        );

        if (!isset(self::STATUS_MAP[$normalizado])) {
            Log::warning("Status de agendamento não mapeado: {$status}");
        }

        return self::STATUS_MAP[$normalizado] ?? 'agendado';
    }

    public function atualizarStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:Concluido,Pendente,Em atendimento',
        ]);

        $agendamento = Agendamento::findOrFail($id);

        $agendamento->definirStatus($request->status);

        return response()->json([
            'success' => true,
            'message' => 'Status atualizado com sucesso!',
            'status' => $agendamento->status_agendamento,
        ]);
    }

    /**
     * (AJAX) Botão do painel: faz o check-in (Pendente -> Em atendimento, na
     * 1ª etapa) ou avança para a próxima etapa do serviço; depois da última,
     * conclui o agendamento.
     */
    public function avancarEtapa($id)
    {
        $agendamento = Agendamento::findOrFail($id);
        $eraCheckIn = $agendamento->status_agendamento === 'Pendente';

        if (!$agendamento->avancarEtapa()) {
            return response()->json([
                'success' => false,
                'message' => 'Este agendamento não tem próxima etapa (já concluído ou cancelado).',
            ], 422);
        }

        return $this->respostaEtapa($agendamento, $eraCheckIn ? 'Check-in realizado!' : 'Etapa avançada!');
    }

    /**
     * (AJAX) Backup manual do RFID: coloca o agendamento direto numa etapa
     * do seu serviço (id de servico_etapas).
     */
    public function definirEtapa(Request $request, $id)
    {
        $dados = $request->validate([
            'etapa' => 'required|integer',
        ]);

        $agendamento = Agendamento::findOrFail($id);

        if (!$agendamento->irParaEtapa((int) $dados['etapa'])) {
            return response()->json([
                'success' => false,
                'message' => 'Essa etapa não pertence ao serviço deste agendamento.',
            ], 422);
        }

        return $this->respostaEtapa($agendamento, 'Etapa atualizada!');
    }

    /**
     * (AJAX) Esteira do agendamento (servico_etapas + etapa_atual), no mesmo
     * formato que o app mobile recebe. Consultada pelo "Ver detalhes".
     */
    public function esteira($id)
    {
        $agendamento = Agendamento::findOrFail($id)->comEsteira();

        return response()->json([
            'status' => $agendamento->status_agendamento,
            'pode_avancar' => in_array($agendamento->status_agendamento, ['Pendente', 'Em atendimento'], true),
            'etapas' => $agendamento->etapas_esteira,
            'resumo' => $agendamento->resumo_etapas,
        ]);
    }

    private function respostaEtapa(Agendamento $agendamento, string $titulo)
    {
        return response()->json([
            'success' => true,
            'title' => $titulo,
            'message' => $agendamento->descricaoEtapa(),
            'status' => $agendamento->status_agendamento,
            'etapa_atual' => $agendamento->etapa_atual,
        ]);
    }
}