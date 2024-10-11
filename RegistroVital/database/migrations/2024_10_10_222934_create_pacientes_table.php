<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned();
            $table->string('cpf', 11)->nullable();
            $table->string('rg', 15)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('rua_endereco', 30)->nullable();
            $table->string('numero_endereco', 10)->nullable();
            $table->string('cep', 8)->nullable();
            $table->string('cidade', 32)->nullable();
            $table->string('estado', 2)->nullable();
            $table->char('genero', 1)->nullable();
            $table->integer('estado_civil')->nullable();
            $table->string('tipo_sanguineo', 2)->nullable();
            $table->dateTime('data_criacao')->nullable();

            $table->primary('id_usuario');

            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pacientes');
    }
}

