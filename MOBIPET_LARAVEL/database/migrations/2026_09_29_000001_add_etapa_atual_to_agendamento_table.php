<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Etapa da esteira (linha de servico_etapas) em que o agendamento está.
 * Null enquanto o agendamento está Pendente ou quando o serviço não tem
 * etapas cadastradas. Avança seguindo servico_etapas.ordem.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('Agendamento', function (Blueprint $table) {
            $table->unsignedBigInteger('etapa_atual')->nullable()->after('status_agendamento');

            $table->foreign('etapa_atual')->references('id_servico_etapa')->on('servico_etapas')->onDelete('set null');
        });

        // Agendamentos já em atendimento começam na primeira etapa do serviço.
        DB::table('Agendamento')
            ->where('status_agendamento', 'Em atendimento')
            ->update([
                'etapa_atual' => DB::raw(
                    '(SELECT se.id_servico_etapa FROM servico_etapas se
                      WHERE se.fk_id_servico = Agendamento.fk_id_servico
                      ORDER BY se.ordem LIMIT 1)'
                ),
            ]);
    }

    public function down(): void
    {
        Schema::table('Agendamento', function (Blueprint $table) {
            $table->dropForeign(['etapa_atual']);
            $table->dropColumn('etapa_atual');
        });
    }
};
