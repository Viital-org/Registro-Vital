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
        Schema::create('profissionais', function (Blueprint $table) {
            $table->id('usuario_id')->constrained('usuarios', 'id')->onDelete('cascade')->primary();
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('registro_profissional', 30)->nullable();
            $table->foreignId('area_atuacao_id')->nullable()->constrained('areas_atuacao', 'id')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('especializacao_id')->nullable()->constrained('especializacoes', 'id')->onDelete('set null')->onUpdate('cascade');
            $table->char('genero', 1)->nullable();
            $table->integer('tempo_experiencia')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
};
