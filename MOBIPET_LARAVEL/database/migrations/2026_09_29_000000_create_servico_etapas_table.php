<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Move as etapas "do meio" da esteira de cada serviço (antes guardadas
 * como JSON na coluna Servico.etapas) para uma tabela própria: um serviço
 * pode ter várias etapas, uma linha por etapa, com a ordem em que ela
 * aparece na esteira.
 *
 * Serviço sem nenhuma linha aqui = sem etapas configuradas: usa a esteira
 * completa (Atendimento::ETAPAS), igual ao comportamento anterior.
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('servico_etapas', function (Blueprint $table) {
            $table->id('id_servico_etapa');
            $table->integer('fk_id_servico');
            $table->string('etapa', 30);
            $table->unsignedSmallInteger('ordem');

            $table->unique(['fk_id_servico', 'etapa']);
            $table->foreign('fk_id_servico')->references('id_servico')->on('Servico')->onDelete('cascade');
        });

        if (Schema::hasColumn('Servico', 'etapas')) {
            $servicos = DB::table('Servico')->whereNotNull('etapas')->get(['id_servico', 'etapas']);

            foreach ($servicos as $servico) {
                $etapas = json_decode($servico->etapas, true) ?: [];

                foreach (array_values(array_unique($etapas)) as $ordem => $etapa) {
                    DB::table('servico_etapas')->insert([
                        'fk_id_servico' => $servico->id_servico,
                        'etapa' => $etapa,
                        'ordem' => $ordem + 1,
                    ]);
                }
            }

            Schema::table('Servico', function (Blueprint $table) {
                $table->dropColumn('etapas');
            });
        }
    }

    public function down(): void
    {
        if (!Schema::hasColumn('Servico', 'etapas')) {
            Schema::table('Servico', function (Blueprint $table) {
                $table->json('etapas')->nullable()->after('categoria');
            });
        }

        DB::table('servico_etapas')
            ->orderBy('fk_id_servico')
            ->orderBy('ordem')
            ->get()
            ->groupBy('fk_id_servico')
            ->each(function ($etapas, $idServico) {
                DB::table('Servico')
                    ->where('id_servico', $idServico)
                    ->update(['etapas' => json_encode($etapas->pluck('etapa')->values())]);
            });

        Schema::dropIfExists('servico_etapas');
    }
};
