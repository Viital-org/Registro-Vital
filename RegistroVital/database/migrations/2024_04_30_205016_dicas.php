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
        Schema::create('Dicas', function (Blueprint $table) {
            $table->id();
            $table->string('dica');
            $table->foreignId('paciente_id')->constrained('Pacientes')->onDelete('cascade');
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Dicas');
    }
};
