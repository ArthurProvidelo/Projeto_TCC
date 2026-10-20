<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';

    // A tabela final não possui created_at/updated_at.
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'cpf',
        'cargo',
        'funcao',
        'telefone',
        'email',
        'endereco',
        'cep',
        'salario',
        'data_admissao',
        'senha',
        'nivel_acesso',
    ];

    protected $hidden = [
        'senha',
    ];

    protected $casts = [
        'data_admissao' => 'date',
        'salario' => 'decimal:2',
    ];

    public function agendamentos(): HasMany
    {
        return $this->hasMany(Agendamento::class, 'fk_id_funcionario', 'id_funcionario');
    }

    /**
     * Indica se o funcionário é administrador do sistema.
     */
    public function isAdmin(): bool
    {
        return $this->nivel_acesso === 'ADMIN';
    }
}