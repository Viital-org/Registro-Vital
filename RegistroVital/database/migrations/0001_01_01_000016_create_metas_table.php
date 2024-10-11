<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('metas', function (Blueprint $table) {
            $table->id()->primary();
            $table->integer('paciente_id')->unsigned();
            $table->string('titulo_meta', 20);
            $table->string('descricao_meta', 80)->nullable();
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->integer('situacao');
            $table->boolean('notificacao_diaria');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
}

