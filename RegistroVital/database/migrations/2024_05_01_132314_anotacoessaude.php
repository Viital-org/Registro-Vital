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
        Schema::create('anotacoessaude', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes')->onDelete('cascade');
            $table->text('anotacao');
            $table->date('data_anotacao');
            $table->unsignedBigInteger('tipo_anot');
            $table->foreign('tipo_anot')->references('id')->on('tipoanotacoes');
            $table->enum('visibilidade', ['Visivel', 'Escondido']);
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anotacoessaude');
    }
};
