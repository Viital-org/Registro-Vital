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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->integer('situacao_endereco');
            $table->string('cep', 8);
            $table->string('tipo_endereco');
            $table->string('estado', 2);
            $table->string('cidade');
            $table->string('bairro');
            $table->string('endereco');
            $table->string('complemento');
            $table->string('numero_endereco');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos_atuacao');
    }
};
