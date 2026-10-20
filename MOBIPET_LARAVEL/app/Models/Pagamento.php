<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    use HasFactory;

    // Nome da tabela
    protected $table = 'pagamento';

    // Chave primária
    protected $primaryKey = 'id_pagamento';

    // Permitir inserção em massa
    protected $fillable = [
        'valor',
        'forma_pagamento',
        'data_pagamento'
    ];

    // Sem timestamps
    public $timestamps = false;
}