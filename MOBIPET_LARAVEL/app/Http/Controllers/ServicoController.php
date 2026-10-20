<?php

namespace App\Http\Controllers;

use App\Models\ServicoEtapa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class ServicoController extends Controller
{
    /**
     * O campo "Tempo Estimado" do formulário aceita texto livre
     * (ex: "45 min", "1h 30min", "01:30") e precisa virar minutos
     * inteiros para caber na coluna duracao_estimada (INTEGER).
     */
    private function parseDuracaoParaMinutos(string $texto): ?int
    {
        $texto = strtolower(trim($texto));

        if (preg_match('/^(\d{1,2}):(\d{2})$/', $texto, $m)) {
            return ((int) $m[1] * 60) + (int) $m[2];
        }

        $horas = 0;
        $minutos = 0;
        $encontrouUnidade = false;

        if (preg_match('/(\d+)\s*h/', $texto, $m)) {
            $horas = (int) $m[1];
            $encontrouUnidade = true;
        }

        if (preg_match('/(\d+)\s*m/', $texto, $m)) {
            $minutos = (int) $m[1];
            $encontrouUnidade = true;
        }

        if (!$encontrouUnidade && preg_match('/(\d+)/', $texto, $m)) {
            // Nenhuma unidade reconhecida (ex: "45"): assume que já é minutos
            $minutos = (int) $m[1];
        }

        $total = ($horas * 60) + $minutos;

        return $total > 0 ? $total : null;
    }

    // Listar serviços
    public function index()
    {
        $servicos = DB::table('servico')->get();
        return view('servicos.index', compact('servicos'));
    }

    // Formulário de criação
    public function create()
    {
        return view('servico.create');
    }

    // Salvar novo serviço
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'categoria' => 'required|string|in:banho,tosa,consulta,outros',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric|min:0',
            'tempoEstimado' => 'required',
            'etapas' => 'nullable|array',
            'etapas.*' => ['string', Rule::in(ServicoEtapa::CONFIGURAVEIS)],
        ]);

        $duracaoMinutos = $this->parseDuracaoParaMinutos((string) $request->tempoEstimado);

        if ($duracaoMinutos === null) {
            return back()
                ->withInput()
                ->withErrors(['tempoEstimado' => 'Informe a duração em um formato válido, ex: "45 min", "1h 30min" ou "01:30".']);
        }

        // Mantém sempre a ordem mestre (ServicoEtapa::CONFIGURAVEIS),
        // independente da ordem em que os checkboxes chegam no request.
        $etapas = array_values(array_intersect(
            ServicoEtapa::CONFIGURAVEIS,
            $request->input('etapas', [])
        ));

        DB::transaction(function () use ($request, $duracaoMinutos, $etapas) {
            $idServico = DB::table('servico')->insertGetId([
                'nome' => $request->nome,
                'categoria' => $request->categoria,
                'descricao' => $request->descricao,
                'preco' => $request->preco,
                'duracao_estimada' => $duracaoMinutos,
            ], 'id_servico');

            foreach ($etapas as $indice => $etapa) {
                DB::table('servico_etapas')->insert([
                    'fk_id_servico' => $idServico,
                    'etapa' => $etapa,
                    'ordem' => $indice + 1,
                ]);
            }
        });

        return redirect()->route('services.create')
                         ->with('success', 'Serviço cadastrado com sucesso!');
    }

    // Visualizar serviço
    public function show($id)
    {
        $servico = DB::table('servico')
            ->where('id_servico', $id)
            ->first();

        return view('servicos.show', compact('servico'));
    }

    // Formulário de edição
    public function edit($id)
    {
        $servico = DB::table('servico')
            ->where('id_servico', $id)
            ->first();

        return view('servicos.edit', compact('servico'));
    }

    // Atualizar serviço
    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'preco' => 'required|numeric',
        ]);

        DB::table('servico')
            ->where('id_servico', $id)
            ->update([
                'nome' => $request->nome,
                'descricao' => $request->descricao,
                'preco' => $request->preco,
            ]);

        return redirect()->route('servicos.index')
                         ->with('success', 'Serviço atualizado com sucesso!');
    }

    // Excluir serviço
    public function destroy($id)
    {
        DB::table('servico')
            ->where('id_servico', $id)
            ->delete();

        return redirect()->route('servicos.index')
                         ->with('success', 'Serviço excluído com sucesso!');
    }
}