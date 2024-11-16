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
            $table->foreignId('paciente_id')->constrained('pacientes', 'usuario_id')->onDelete('cascade');
            $table->foreignId('profissional_id')->constrained('profissionais', 'usuario_id')->onDelete('cascade');
            $table->foreignId('area_atuacao_id')->constrained('areas_atuacao')->onDelete('cascade');
            $table->string('especializacao_id', 30)->nullable();
            $table->date('data_agendamento');
            $table->time('hora_agendamento');
            $table->foreignId('consulta_id')->nullable()->constrained('consultas')->onDelete('cascade');
            $table->integer('situacao_paciente');
            $table->integer('situacao_profissional');
            $table->foreignId('endereco_consulta_id')->constrained('enderecos');
            $table->float('valor_atendimento');
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
