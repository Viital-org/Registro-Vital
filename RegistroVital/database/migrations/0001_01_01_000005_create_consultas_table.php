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
    public function up(): void
    {
        Schema::create('consultas', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('paciente')->unsigned();
            $table->integer('profissional')->unsigned();
            $table->integer('agendamento_id')->unsigned();
            $table->integer('area_atuacao_id')->unsigned();
            $table->integer('especializacao_id')->unsigned()->nullable();
            $table->integer('situacao');
            $table->date('data');
            $table->decimal('valor', 5, 2)->nullable();
            $table->integer('endereco_consulta')->unsigned();

            // Chaves estrangeiras
            //$table->foreign('paciente')->references('id')->on('pacientes')->onDelete('cascade');
            //$table->foreign('profissional')->references('id')->on('profissionais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
}

