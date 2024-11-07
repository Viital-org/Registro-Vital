<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
<<<<<<<< HEAD:RegistroVital/database/migrations/2024_05_01_041716_tipoanotacoes.php
    /**
     * Run the migrations.
     */
========

>>>>>>>> develop:RegistroVital/database/migrations/0001_01_01_000022_create_estados_civis_table.php
    public function up(): void
    {
        Schema::create('tipoanotacoes', function (Blueprint $table) {
            $table->id();
            $table->Integer('tipo_anotacao');
            $table->text('desc_anotacao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

<<<<<<<< HEAD:RegistroVital/database/migrations/2024_05_01_041716_tipoanotacoes.php
    /**
     * Reverse the migrations.
     */
========
>>>>>>>> develop:RegistroVital/database/migrations/0001_01_01_000022_create_estados_civis_table.php
    public function down(): void
    {
        Schema::dropIfExists('tipoanotacoes');
    }
};
