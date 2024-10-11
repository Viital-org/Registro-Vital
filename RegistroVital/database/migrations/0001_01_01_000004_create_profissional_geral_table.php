<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionalGeralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('profissional_geral', function (Blueprint $table) {
            $table->integer('categoria_usuario')->unsigned();
            $table->string('descricao', 35)->nullable();
            $table->string('endereco_trabalho', 60)->nullable();
            $table->string('telefone_profissional', 11)->nullable();

            $table->primary('categoria_usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('profissional_geral');
    }
}
