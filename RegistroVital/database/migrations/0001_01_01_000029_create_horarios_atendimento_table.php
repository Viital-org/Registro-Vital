<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('horarios_atendimento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('especializacao_profissional_id')->constrained('especializacoes_profissionais')->onDelete('cascade');
            $table->string('dia_semana')->nullable();
            $table->time('inicio_atendimento');
            $table->time('fim_atendimento');
            $table->time('tempo_consulta');
            $table->time('inicio_pausa')->nullable();
            $table->time('fim_pausa')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarios_atendimento');
    }
};
