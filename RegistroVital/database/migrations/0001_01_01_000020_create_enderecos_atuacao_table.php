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
        Schema::create('enderecos_atuacao', function (Blueprint $table) {
            $table->id();
            $table->foreignId('profissional_id')->constrained('profissionais', 'usuario_id')->onDelete('cascade');
            $table->string('area_atuacao', 20);
            $table->integer('situacao_endereco');
            $table->string('endereco', 30);
            $table->string('numero_endereco', 10);
            $table->string('cep', 8);
            $table->string('cidade', 32);
            $table->string('estado', 2);
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
