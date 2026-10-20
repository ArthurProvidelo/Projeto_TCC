<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // A tabela users já existe no banco mobipet.
        // A antiga migration tinha uma referência incorreta
        // à tabela "pets", que poderia apagar a tabela Pet real.
        //
        // Portanto, esta migration não altera nenhuma tabela existente.
    }

    public function down(): void
    {
        // Nenhuma alteração para desfazer.
    }
};