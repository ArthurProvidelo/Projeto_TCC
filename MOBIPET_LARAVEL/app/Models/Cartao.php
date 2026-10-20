<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cartao extends Model
{
    protected $table = 'cartoes';

    protected $primaryKey = 'id_cartao';

    protected $fillable = [
        'uid',
        'fk_id_pet',
    ];

    public function pet()
    {
        return $this->belongsTo(Pet::class, 'fk_id_pet', 'id_pet');
    }
}
