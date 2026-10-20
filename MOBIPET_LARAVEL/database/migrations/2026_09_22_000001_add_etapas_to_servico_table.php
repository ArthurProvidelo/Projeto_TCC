<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Etapas "do meio" da esteira de atendimento (RFID) que este serviço
 * percorre — ex.: um banho simples pode pular tosa/escovação/perfume,
 * enquanto um banho premium passa por todas. As etapas estruturais
 * (check_in, pronto_retirada, finalizado) são sempre adicionadas pelo
 * Model, não fazem parte desta coluna.
 *
 * Null/vazio = serviço sem etapas configuradas (cadastrado antes desta
 * coluna existir, ou nenhuma marcada no formulário): usa a esteira
 * completa, igual ao comportamento anterior (Atendimento::ETAPAS).
 */
return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('Servico', 'etapas')) {
            Schema::table('Servico', function (Blueprint $table) {
                $table->json('etapas')->nullable()->after('categoria');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('Servico', 'etapas')) {
            Schema::table('Servico', function (Blueprint $table) {
                $table->dropColumn('etapas');
            });
        }
    }
};
