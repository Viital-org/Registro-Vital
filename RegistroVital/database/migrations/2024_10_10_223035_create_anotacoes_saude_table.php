<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnotacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anotacoes', function (Blueprint $table) {
            $table->increments('id_anotacao');
            $table->unsignedBigInteger('id_paciente');
            $table->integer('tipo_anotacao');
            $table->string('descricao_anotacao', 100);
            $table->char('tipo_visibilidade', 1);
            $table->boolean('possui_documento')->nullable();

            $table->primary('id_anotacao');

            // Chave estrangeira
            // $table->foreign('id_paciente')->references('id')->on('pacientes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('anotacoes');
    }
}

