<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->increments('id_consulta');
            $table->integer('paciente')->unsigned();
            $table->integer('profissional')->unsigned();
            $table->integer('id_agendamento')->unsigned();
            $table->integer('id_area_atuacao')->unsigned();
            $table->integer('id_especializacao')->unsigned()->nullable();
            $table->integer('situacao');
            $table->date('data');
            $table->decimal('valor', 5, 2)->nullable();
            $table->integer('endereco_consulta')->unsigned();

            // Chaves estrangeiras
            // $table->foreign('paciente')->references('id_paciente')->on('pacientes')->onDelete('cascade');
            // $table->foreign('profissional')->references('id_profissional')->on('profissionais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultas');
    }
}

