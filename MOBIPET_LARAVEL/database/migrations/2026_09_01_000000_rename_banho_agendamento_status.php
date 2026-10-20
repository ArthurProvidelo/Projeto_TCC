<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

/**
 * Renomeia o status de atendimento em andamento de "Banho" para
 * "Em atendimento" nos agendamentos já existentes, acompanhando a troca
 * feita no painel do funcionário e na API do app.
 */
return new class extends Migration
{
    public function up(): void
    {
        DB::table('Agendamento')
            ->where('status_agendamento', 'Banho')
            ->update(['status_agendamento' => 'Em atendimento']);
    }

    public function down(): void
    {
        DB::table('Agendamento')
            ->where('status_agendamento', 'Em atendimento')
            ->update(['status_agendamento' => 'Banho']);
    }
};
