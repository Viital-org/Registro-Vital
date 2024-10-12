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
            $table->foreignId('usuario_id')->constrained('usuarios', 'id')->onDelete('cascade')->primary();
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('registro_profissional', 30)->nullable();
            $table->string('area_atuacao', 30)->nullable()->unique();
            $table->string('especializacao', 30)->nullable();
            $table->char('genero', 1)->nullable();
            $table->integer('tempo_experiencia')->nullable();
            $table->dateTime('data_criacao')->nullable();
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
