<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposRecomendacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('tipos_recomendacao', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('DESCRICAO', 40)->nullable();
            $table->char('GERA_NOTIFICACAO', 1)->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_recomendacao');
    }
}

