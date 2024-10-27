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
        Schema::create('consultas', function (Blueprint $table) {
            $table->Id('id')->constrained('agendamentos')->onDelete('cascade')->primary();
            $table->foreignId('paciente_id')->constrained('pacientes', 'usuario_id')->onDelete('cascade');
            $table->foreignId('profissional_id')->constrained('profissionais', 'usuario_id')->onDelete('cascade');
            $table->foreignId('agendamento_id')->constrained('agendamentos')->onDelete('cascade');
            $table->foreignId('area_atuacao_id')->constrained('areas_atuacao');
            $table->foreignId('especializacao_id')->nullable()->constrained('especializacoes');
            $table->integer('situacao');
            $table->date('data');
            $table->decimal('valor', 5, 2)->nullable();
            $table->foreignId('endereco_consulta')->constrained('enderecos')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consultas');
    }
};

