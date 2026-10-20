<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;

    protected $table = 'Pet';

    protected $primaryKey = 'id_pet';

    protected $fillable = [
        'nome',
        'especie',
        'raca',
        'porte',
        'data_nascimento',
        'status',
        'fk_id_cliente',
    ];

    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'fk_id_cliente', 'id_cliente');
    }

    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'fk_id_pet', 'id_pet');
    }
}