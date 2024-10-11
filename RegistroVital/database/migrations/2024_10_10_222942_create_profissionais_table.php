<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfissionaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profissionais', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned();
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('registro_profissional', 30)->nullable();
            $table->string('area_atuacao', 30)->nullable();
            $table->string('especializacao', 30)->nullable();
            $table->char('genero', 1)->nullable();
            $table->integer('tempo_experiencia')->nullable();
            $table->dateTime('data_criacao')->nullable();

            $table->primary('id_usuario');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');

            $table->unique('area_atuacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profissionais');
    }
}
