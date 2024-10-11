<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecomendacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('recomendacoes', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('consulta_id')->unsigned();
            $table->integer('profissional_id')->unsigned();
            $table->integer('paciente_id')->unsigned();
            $table->integer('tipo_recomendacao')->unsigned();
            $table->string('descricao_recomendacao', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('recomendacoes');
    }
}
