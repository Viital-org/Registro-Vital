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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id('usuario_id')->constrained('usuarios', 'id')->onDelete('cascade')->primary();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 15)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('rua_endereco', 30)->nullable();
            $table->string('numero_endereco', 10)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('cidade', 32)->nullable();
            $table->string('estado', 2)->nullable();
            $table->char('genero', 1)->nullable();
            $table->integer('estado_civil')->nullable();
            $table->string('tipo_sanguineo', 2)->nullable();
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
        Schema::dropIfExists('pacientes');
    }
};

