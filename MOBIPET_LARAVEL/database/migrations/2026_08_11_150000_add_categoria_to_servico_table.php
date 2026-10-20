<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('Servico', 'categoria')) {
            Schema::table('Servico', function (Blueprint $table) {
                $table->string('categoria')->nullable()->after('nome');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('Servico', 'categoria')) {
            Schema::table('Servico', function (Blueprint $table) {
                $table->dropColumn('categoria');
            });
        }
    }
};
