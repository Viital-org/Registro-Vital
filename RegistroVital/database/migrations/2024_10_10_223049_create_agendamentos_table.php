<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id_agendamento');
            $table->unsignedBigInteger('paciente');
            $table->unsignedBigInteger('profissional');
            $table->string('area_atuacao', 20);
            $table->string('especializacao', 30)->nullable();
            $table->date('data_agendamento');
            $table->integer('situacao_paciente');
            $table->integer('situacao_profissional');
            $table->unsignedBigInteger('endereco_consulta');

            $table->primary('id_agendamento');

            $table->foreign('area_atuacao')
                ->references('area_atuacao')
                ->on('profissionais')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
}
