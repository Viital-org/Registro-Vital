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
<<<<<<< HEAD:RegistroVital/database/migrations/2024_04_30_205016_dicas.php
            $table->string('dica');
            $table->foreignId('paciente_id')->constrained('Pacientes')->onDelete('cascade');
            $table->text('descricao');
=======
            $table->string('extensao_documento', 5)->nullable();
            $table->integer('tamanho_maximo_kb');
>>>>>>> develop:RegistroVital/database/migrations/0001_01_01_000008_create_tipos_documento_table.php
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
