<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profissional_geral', function (Blueprint $table) {
            $table->unsignedInteger('categoria_usuario')->primary();
            $table->string('descricao', 35)->nullable();
            $table->string('endereco_trabalho', 60)->nullable();
            $table->string('telefone_profissional', 11)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissional_geral');
    }
};
