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
        Schema::create('Especializacoes', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:RegistroVital/database/migrations/2024_04_30_033834_especializacoes.php
            $table->string('especializacao');
            $table->integer('tempoespecializacao');
            $table->foreignId('area_id')->constrained('Atuaareas')->onDelete('cascade');
            $table->text('descricao');
========
            $table->string('descricao_especializacao', 60);
            $table->foreignId('area_atuacao_id')->constrained('areas_atuacao')->onDelete('cascade');
>>>>>>>> develop:RegistroVital/database/migrations/0001_01_01_000019_create_especializacoes_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Especializacoes');
    }
};
