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
    public function up(): void
    {
        Schema::create('agendas_profissionais', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('profissional_id');
            $table->unsignedBigInteger('consulta_id');
            $table->string('area_atuacao', 20);
            $table->unsignedBigInteger('paciente_id');
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
    public function down(): void
    {
        Schema::dropIfExists('agendas_profissionais');
    }
}

