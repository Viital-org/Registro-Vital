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
        Schema::create('agendas_profissionais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profissional_id')->constrained('profissionais', 'usuario_id')->onDelete('cascade');
            $table->foreignId('consulta_id')->constrained('consultas')->onDelete('cascade');
            $table->foreignId('paciente_id')->constrained('pacientes', 'usuario_id')->onDelete('cascade');
            $table->foreignId('enderecos_atuacao_id')->constrained('enderecos')->onDelete('cascade');
            $table->foreignId('area_atuacao_id')->constrained('areas_atuacao')->onDelete('cascade');
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
        Schema::dropIfExists('agendas_profissionais');
    }
};

