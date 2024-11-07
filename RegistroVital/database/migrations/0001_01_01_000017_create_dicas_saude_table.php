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
        Schema::create('Atuaareas', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:RegistroVital/database/migrations/2024_04_30_040545_atuaareas.php
            $table->string('area');
            $table->text('descricao');
========
            $table->string('descricao_dica', 100);
            $table->foreignId('tipo_usuario')->constrained('tipos_usuarios', 'id')->onDelete('cascade');
>>>>>>>> develop:RegistroVital/database/migrations/0001_01_01_000017_create_dicas_saude_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Atuaareas');
    }
};
