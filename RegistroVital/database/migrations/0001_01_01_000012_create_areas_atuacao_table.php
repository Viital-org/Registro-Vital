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
        Schema::create('Metas', function (Blueprint $table) {
            $table->id();
<<<<<<<< HEAD:RegistroVital/database/migrations/2024_05_01_055859_metas.php
            $table->string('meta', 70);
            $table->date('data_inicio');
            $table->date('data_fim');
            $table->text('descricao');
========
            $table->string('descricao_area', 30);
>>>>>>>> develop:RegistroVital/database/migrations/0001_01_01_000012_create_areas_atuacao_table.php
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Metas');
    }
};
