<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServicoEtapa extends Model
{
    protected $table = 'servico_etapas';

    protected $primaryKey = 'id_servico_etapa';

    public $timestamps = false;

    protected $fillable = [
        'fk_id_servico',
        'etapa',
        'ordem',
    ];

    /**
     * Etapas que o funcionário pode marcar no cadastro do serviço, na ordem
     * padrão da esteira. check_in e finalizado não são linhas desta tabela:
     * são o início (status Em atendimento) e o fim (status Concluido) do
     * agendamento.
     */
    public const CONFIGURAVEIS = [
        'banho',
        'secagem',
        'tosa',
        'escovacao',
        'perfume',
        'pronto_retirada',
    ];

    public const LABELS = [
        'check_in' => 'Check-in',
        'banho' => 'Banho',
        'secagem' => 'Secagem',
        'tosa' => 'Tosa',
        'escovacao' => 'Escovação',
        'perfume' => 'Perfume',
        'pronto_retirada' => 'Pronto para retirada',
        'finalizado' => 'Finalizado',
    ];

    public const ICONS = [
        'check_in' => 'fa-solid fa-clipboard-check',
        'banho' => 'fa-solid fa-shower',
        'secagem' => 'fa-solid fa-wind',
        'tosa' => 'fa-solid fa-scissors',
        'escovacao' => 'fa-solid fa-broom',
        'perfume' => 'fa-solid fa-spray-can-sparkles',
        'pronto_retirada' => 'fa-solid fa-box-open',
        'finalizado' => 'fa-solid fa-circle-check',
    ];

    public function servico()
    {
        return $this->belongsTo(Servico::class, 'fk_id_servico', 'id_servico');
    }

    public function label(): string
    {
        return self::LABELS[$this->etapa] ?? $this->etapa;
    }
}
