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
        Schema::create('Agendamentos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('especializacao_id');
            $table->unsignedBigInteger('profissional_id');
            $table->unsignedBigInteger('paciente_id');
            $table->date('data_agendamento');
            $table->unsignedBigInteger('consulta_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('especializacao_id')->references('id')->on('Especializacoes');
            $table->foreign('profissional_id')->references('id')->on('Profissionais')->onDelete('cascade');
            $table->foreign('paciente_id')->references('id')->on('Pacientes')->onDelete('cascade');
            $table->foreign('consulta_id')->references('id')->on('Consultas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Agendamentos');
    }
};
