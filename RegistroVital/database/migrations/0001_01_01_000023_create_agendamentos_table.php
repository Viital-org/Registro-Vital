<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente')->constrained('pacientes', 'usuario_id')->onDelete('cascade');
            $table->foreignId('profissional')->constrained('profissionais', 'usuario_id')->onDelete('cascade');
            $table->foreignId('area_atuacao_id')->constrained('areas_atuacao')->onDelete('cascade');
            $table->string('especializacao', 30)->nullable();
            $table->date('data_agendamento');
            $table->integer('situacao_paciente');
            $table->integer('situacao_profissional');
            $table->foreignId('endereco_consulta')->constrained('enderecos_atuacao')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('agendamentos');
    }
};
