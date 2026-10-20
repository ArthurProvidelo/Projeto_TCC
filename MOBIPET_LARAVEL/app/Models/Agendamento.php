<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'Agendamento';

    // Chave primária
    protected $primaryKey = 'id_agendamento';

    // Permitir inserção em massa
    protected $fillable = [
        'id_agendamento',
        'data_agendamento',
        'horario',
        'status_agendamento',
        'etapa_atual',
        'observacao',
        'fk_id_pet',
        'fk_id_servico',
        'fk_id_funcionario'
    ];

    // Se não tiver created_at e updated_at
    public $timestamps = false;

    /**
     * Janela de atendimento da agenda: das 07:00 às 18:00, de 30 em 30 minutos.
     * Fonte única usada para montar o <select> do formulário e para validar
     * o horário recebido no servidor.
     *
     * @return array<int, string>  ex.: ['07:00', '07:30', ..., '18:00']
     */
    public static function horariosDisponiveis(): array
    {
        $slots = [];

        for ($minutos = 7 * 60; $minutos <= 18 * 60; $minutos += 30) {
            $slots[] = sprintf('%02d:%02d', intdiv($minutos, 60), $minutos % 60);
        }

        return $slots;
    }

    /**
     * Regra de conflito da agenda: o mesmo profissional não pode ter dois
     * agendamentos ativos na mesma data e horário (cancelados liberam a
     * vaga). Usada pelo formulário web e pela API do app mobile.
     */
    public function scopeAtivosDoProfissionalNaData($query, $idFuncionario, string $data)
    {
        return $query->where('data_agendamento', $data)
            ->where('fk_id_funcionario', $idFuncionario)
            ->where(function ($q) {
                $q->whereNull('status_agendamento')
                  ->orWhereRaw('LOWER(status_agendamento) NOT LIKE ?', ['%cancelad%']);
            });
    }

    public static function horarioOcupado($idFuncionario, string $data, string $horario): bool
    {
        return self::ativosDoProfissionalNaData($idFuncionario, $data)
            ->where('horario', 'like', substr($horario, 0, 5) . '%')
            ->exists();
    }

    /**
     * Grade de horários (07:00-18:00, de 30 em 30 min) de um profissional
     * numa data, marcando os já ocupados e os que já passaram (hoje).
     *
     * @return array<int, array{hora: string, disponivel: bool, motivo: ?string}>
     */
    public static function gradeHorarios($idFuncionario, \Carbon\Carbon $data): array
    {
        $data = $data->copy()->startOfDay();

        if ($data->lt(\Carbon\Carbon::today())) {
            return [];
        }

        $ocupados = self::ativosDoProfissionalNaData($idFuncionario, $data->toDateString())
            ->pluck('horario')
            ->map(fn ($h) => substr((string) $h, 0, 5))
            ->all();

        $agora = \Carbon\Carbon::now();
        $ehHoje = $data->isToday();

        return array_map(function ($hora) use ($ocupados, $ehHoje, $agora, $data) {
            $passou = $ehHoje && $data->copy()->setTimeFromTimeString($hora)->lte($agora);
            $ocupado = in_array($hora, $ocupados, true);

            return [
                'hora'       => $hora,
                'disponivel' => !$passou && !$ocupado,
                'motivo'     => $passou ? 'passou' : ($ocupado ? 'ocupado' : null),
            ];
        }, self::horariosDisponiveis());
    }

    /**
     * Sempre que a esteira anda, o status do pet reflete o ponto em que ele
     * está, para telas que mostram só o Pet (ex.: app mobile).
     */
    protected static function booted(): void
    {
        static::saved(function (Agendamento $agendamento) {
            if (!$agendamento->wasChanged(['status_agendamento', 'etapa_atual']) || !$agendamento->fk_id_pet) {
                return;
            }

            $statusPet = match ($agendamento->status_agendamento) {
                'Pendente' => 'Aguardando atendimento',
                'Em atendimento' => $agendamento->servicoEtapaAtual?->label() ?? ServicoEtapa::LABELS['check_in'],
                'Concluido' => ServicoEtapa::LABELS['finalizado'],
                default => null,
            };

            if ($statusPet) {
                Pet::where('id_pet', $agendamento->fk_id_pet)->update(['status' => $statusPet]);
            }
        });
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'fk_id_pet', 'id_pet');
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'fk_id_servico', 'id_servico');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'fk_id_funcionario', 'id_funcionario');
    }

    /**
     * Etapa da esteira (servico_etapas) apontada por etapa_atual. O nome
     * não é etapaAtual() porque no JSON a relação viraria "etapa_atual" e
     * sobrescreveria o id da coluna.
     */
    public function servicoEtapaAtual()
    {
        return $this->belongsTo(ServicoEtapa::class, 'etapa_atual', 'id_servico_etapa');
    }

    /**
     * Próxima etapa do serviço seguindo servico_etapas.ordem: a primeira,
     * se ainda não há etapa atual, ou a seguinte à atual. Null quando o
     * serviço não tem etapas ou a atual já é a última.
     */
    public function proximaServicoEtapa(): ?ServicoEtapa
    {
        $query = ServicoEtapa::where('fk_id_servico', $this->fk_id_servico)->orderBy('ordem');

        if ($this->etapa_atual) {
            $ordemAtual = ServicoEtapa::whereKey($this->etapa_atual)->value('ordem');
            $query->where('ordem', '>', $ordemAtual);
        }

        return $query->first();
    }

    /**
     * Avança a esteira do agendamento:
     *  - Pendente -> Em atendimento (check-in), já na primeira etapa do serviço;
     *  - Em atendimento -> próxima etapa (servico_etapas.ordem) ou, depois
     *    da última (ou se o serviço não tem etapas), Concluido.
     *
     * Retorna false quando não há para onde avançar (concluído/cancelado).
     */
    public function avancarEtapa(): bool
    {
        if ($this->status_agendamento === 'Pendente') {
            return $this->definirStatus('Em atendimento');
        }

        if ($this->status_agendamento !== 'Em atendimento') {
            return false;
        }

        $proxima = $this->proximaServicoEtapa();

        if ($proxima) {
            $this->etapa_atual = $proxima->id_servico_etapa;
        } else {
            $this->status_agendamento = 'Concluido';
        }

        $this->unsetRelation('servicoEtapaAtual');

        return $this->save();
    }

    /**
     * Coloca o agendamento direto numa etapa do seu serviço (backup manual
     * do RFID no painel). Retorna false se a etapa não é deste serviço.
     */
    public function irParaEtapa(int $idServicoEtapa): bool
    {
        $pertenceAoServico = ServicoEtapa::whereKey($idServicoEtapa)
            ->where('fk_id_servico', $this->fk_id_servico)
            ->exists();

        if (!$pertenceAoServico) {
            return false;
        }

        $this->status_agendamento = 'Em atendimento';
        $this->etapa_atual = $idServicoEtapa;
        $this->unsetRelation('servicoEtapaAtual');

        return $this->save();
    }

    /**
     * Troca o status mantendo etapa_atual coerente: Pendente zera a etapa;
     * Em atendimento sem etapa começa na primeira; Concluido mantém a última.
     */
    public function definirStatus(string $status): bool
    {
        $this->status_agendamento = $status;

        if ($status === 'Pendente') {
            $this->etapa_atual = null;
        } elseif ($status === 'Em atendimento' && !$this->etapa_atual) {
            $this->etapa_atual = $this->proximaServicoEtapa()?->id_servico_etapa;
        }

        $this->unsetRelation('servicoEtapaAtual');

        return $this->save();
    }

    /**
     * Texto curto do ponto da esteira, ex.: "Em atendimento (Banho)".
     */
    public function descricaoEtapa(): string
    {
        $etapa = $this->servicoEtapaAtual;

        if ($this->status_agendamento !== 'Em atendimento' || !$etapa) {
            return (string) $this->status_agendamento;
        }

        return "{$this->status_agendamento} ({$etapa->label()})";
    }

    /**
     * Esteira pronta para exibição no painel: Check-in, as etapas do serviço
     * (servico_etapas, na ordem) e Finalizado, cada uma com status
     * done/current/pending conforme status_agendamento + etapa_atual.
     *
     * Espera servico.servicoEtapas carregado (eager load no controller).
     *
     * @return array<int, array{id: ?int, chave: string, label: string, icone: string, status: string}>
     */
    public function esteira(): array
    {
        $etapasServico = $this->servico?->servicoEtapas ?? collect();

        $fluxo = [['id' => null, 'chave' => 'check_in']];

        foreach ($etapasServico as $etapa) {
            $fluxo[] = ['id' => (int) $etapa->id_servico_etapa, 'chave' => $etapa->etapa];
        }

        $fluxo[] = ['id' => null, 'chave' => 'finalizado'];

        $indiceAtual = $this->indiceNaEsteira($fluxo);
        $ultimoIndice = count($fluxo) - 1;

        return array_map(function ($etapa, $indice) use ($indiceAtual, $ultimoIndice) {
            if ($indice < $indiceAtual || ($indice === $indiceAtual && $indice === $ultimoIndice)) {
                $status = 'done';
            } elseif ($indice === $indiceAtual) {
                $status = 'current';
            } else {
                $status = 'pending';
            }

            return [
                ...$etapa,
                'label' => ServicoEtapa::LABELS[$etapa['chave']] ?? $etapa['chave'],
                'icone' => ServicoEtapa::ICONS[$etapa['chave']] ?? 'fa-solid fa-circle',
                'status' => $status,
            ];
        }, $fluxo, array_keys($fluxo));
    }

    /**
     * Posição do agendamento na esteira: -1 (Pendente, nada feito ainda),
     * a etapa atual quando Em atendimento, ou a última (Concluido).
     */
    private function indiceNaEsteira(array $fluxo): int
    {
        if ($this->status_agendamento === 'Concluido') {
            return count($fluxo) - 1;
        }

        if ($this->status_agendamento !== 'Em atendimento') {
            return -1;
        }

        foreach ($fluxo as $indice => $etapa) {
            if ($etapa['id'] !== null && $etapa['id'] === (int) $this->etapa_atual) {
                return $indice;
            }
        }

        // Em atendimento sem etapa (serviço sem etapas): acabou de fazer o check-in.
        return 0;
    }

    /**
     * Carrega as etapas do serviço e inclui no JSON a mesma esteira do
     * painel (etapas_esteira + resumo_etapas). Usado pela API do app mobile
     * e pelo "Ver detalhes" do painel, para os dois mostrarem exatamente o
     * que está em servico_etapas / etapa_atual.
     */
    public function comEsteira(): static
    {
        $this->loadMissing('servico.servicoEtapas');

        return $this->append(['etapas_esteira', 'resumo_etapas']);
    }

    public function getEtapasEsteiraAttribute(): array
    {
        return $this->esteira();
    }

    public function getResumoEtapasAttribute(): array
    {
        return self::resumoEsteira($this->esteira());
    }

    /**
     * Progresso de uma esteira montada por esteira(): etapas concluídas,
     * total e percentual (barra de progresso do painel).
     */
    public static function resumoEsteira(array $esteira): array
    {
        $concluidas = count(array_filter($esteira, fn ($e) => $e['status'] === 'done'));
        $total = count($esteira);

        return [
            'concluidas' => $concluidas,
            'total' => $total,
            'percentual' => $total ? (int) round($concluidas / $total * 100) : 0,
        ];
    }
}
