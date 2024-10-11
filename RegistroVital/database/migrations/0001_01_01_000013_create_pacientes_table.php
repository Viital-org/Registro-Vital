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
    public function up(): void
    {
        Schema::create('pacientes', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->primary();
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

            //chave estrangeira
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pacientes');
    }
}

