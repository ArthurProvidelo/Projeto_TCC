<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Adiciona o nível de acesso do funcionário.
     * Valores esperados: 'FUNCIONARIO' (padrão) e 'ADMIN'.
     */
    public function up(): void
    {
        Schema::table('funcionario', function (Blueprint $table) {
            $table->string('nivel_acesso', 20)
                ->default('FUNCIONARIO')
                ->after('senha');
        });

        // Garante que registros já existentes fiquem consistentes.
        DB::table('funcionario')
            ->whereNull('nivel_acesso')
            ->update(['nivel_acesso' => 'FUNCIONARIO']);
    }

    public function down(): void
    {
        Schema::table('funcionario', function (Blueprint $table) {
            $table->dropColumn('nivel_acesso');
        });
    }
};
