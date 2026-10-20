<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Vínculo entre o UID gravado num cartão RFID e o pet correspondente.
 * Cadastrado pelo sketch de cadastro do ESP32 (grava o id do pet no bloco 4
 * do cartão MIFARE e envia uid + pet_id para a API). Usada como registro do
 * vínculo; a leitura no dia a dia manda o pet_id direto (lido do cartão).
 */
return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cartoes', function (Blueprint $table) {
            $table->id('id_cartao');
            $table->string('uid', 64)->unique();
            $table->integer('fk_id_pet');
            $table->timestamps();

            $table->foreign('fk_id_pet')->references('id_pet')->on('Pet')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cartoes');
    }
};
