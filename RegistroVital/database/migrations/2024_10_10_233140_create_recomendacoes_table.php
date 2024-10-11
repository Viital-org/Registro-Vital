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
    public function up()
    {
        Schema::create('recomendacoes', function (Blueprint $table) {
            $table->increments('id_recomendacao');
            $table->integer('id_consulta')->unsigned();
            $table->integer('id_profissional')->unsigned();
            $table->integer('id_paciente')->unsigned();
            $table->integer('tipo_recomendacao')->unsigned();
            $table->string('descricao_recomendacao', 100);

            $table->primary('id_recomendacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recomendacoes');
    }
}
