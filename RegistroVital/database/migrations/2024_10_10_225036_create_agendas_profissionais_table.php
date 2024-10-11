<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasProfissionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas_profissionais', function (Blueprint $table) {
            $table->increments('id_agenda');
            $table->unsignedBigInteger('id_profissional');
            $table->unsignedBigInteger('id_consulta');
            $table->string('area_atuacao', 20);
            $table->unsignedBigInteger('id_paciente');
            $table->unsignedBigInteger('endereco_consulta');

            // chaves estrangeiras
            // $table->foreign('id_profissional')->references('id')->on('profissionais');
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
        Schema::dropIfExists('agendas_profissionais');
    }
}

