<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Tabela nova para o acompanhamento de atendimento (esteira de etapas lida
 * via RFID) usado pelo app mobile. Não existia contrapartida nenhuma no
 * banco até aqui — o app mobile usava dados 100% mockados.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id('id_atendimento');
            $table->integer('fk_id_pet');
            $table->integer('fk_id_servico');
            $table->integer('fk_id_agendamento')->nullable();
            $table->string('etapa_atual', 30);
            $table->timestamp('iniciado_em');
            $table->timestamp('finalizado_em')->nullable();

            $table->foreign('fk_id_pet')->references('id_pet')->on('Pet')->onDelete('cascade');
            $table->foreign('fk_id_servico')->references('id_servico')->on('Servico')->onDelete('cascade');
            $table->foreign('fk_id_agendamento')->references('id_agendamento')->on('Agendamento')->onDelete('set null');
        });

        Schema::create('atendimento_etapas', function (Blueprint $table) {
            $table->id('id_atendimento_etapa');
            $table->unsignedBigInteger('fk_id_atendimento');
            $table->string('etapa', 30);
            $table->timestamp('concluida_em');

            $table->foreign('fk_id_atendimento')->references('id_atendimento')->on('atendimentos')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atendimento_etapas');
        Schema::dropIfExists('atendimentos');
    }
};
