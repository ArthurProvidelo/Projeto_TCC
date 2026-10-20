<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // A coluna "status" já vem definida na tabela Pet do mobipet.sql.
        // O guard mantém a migration segura em bancos que já a possuem.
        if (!Schema::hasColumn('pet', 'status')) {
            Schema::table('pet', function (Blueprint $table) {
                $table->string('status')->default('Aguardando atendimento');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pet', 'status')) {
            Schema::table('pet', function (Blueprint $table) {
                $table->dropColumn('status');
            });
        }
    }
};
