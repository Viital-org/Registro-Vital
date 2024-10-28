<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('especializacoes_profissionais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profissional_id')->constrained('profissionais', 'usuario_id')->onDelete('cascade');
            $table->integer('area_atuacao_id')->constrained('profissionais','area_atuacao_id')->onDelete('cascade');
            $table->foreignId('especializacao_id')->constrained('especializacoes')->onDelete('cascade');
            $table->foreignId('enderecos_atuacao_id')->constrained('enderecos')->onDelete('cascade');
            $table->foreignId('valor_atendimento')->constrained('areas_atuacao')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Enderecos_profissionais');
    }
};
