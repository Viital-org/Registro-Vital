<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotacoesSaudeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('anotacoes', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('paciente_id');
            $table->integer('tipo_anotacao');
            $table->string('descricao_anotacao', 100);
            $table->char('tipo_visibilidade', 1);
            $table->boolean('possui_documento')->nullable();


            // Chave estrangeira
            //$table->foreign('paciente_id')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('anotacoes');
    }
}

