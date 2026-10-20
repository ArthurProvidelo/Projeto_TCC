<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * CEP informado no cadastro (o endereço já é preenchido pelo ViaCEP a partir
 * dele). Guardado só com os 8 dígitos; a máscara 00000-000 é aplicada na
 * exibição. Nullable: cadastros antigos, login pelo Google e o app mobile
 * não informam CEP.
 */
return new class extends Migration
{
    public function up(): void
    {
        foreach (['Cliente', 'Funcionario'] as $tabela) {
            if (!Schema::hasColumn($tabela, 'cep')) {
                Schema::table($tabela, function (Blueprint $table) {
                    $table->string('cep', 8)->nullable()->after('endereco');
                });
            }
        }
    }

    public function down(): void
    {
        foreach (['Cliente', 'Funcionario'] as $tabela) {
            if (Schema::hasColumn($tabela, 'cep')) {
                Schema::table($tabela, function (Blueprint $table) {
                    $table->dropColumn('cep');
                });
            }
        }
    }
};
