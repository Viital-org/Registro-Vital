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
    public function up(): void
    {
        Schema::create('profissionais', function (Blueprint $table) {
            $table->unsignedBigInteger('usuario_id')->primary();
            $table->string('cpf', 11)->nullable();
            $table->string('cnpj', 14)->nullable();
            $table->string('registro_profissional', 30)->nullable();
            $table->string('area_atuacao', 30)->nullable();
            $table->string('especializacao', 30)->nullable();
            $table->char('genero', 1)->nullable();
            $table->integer('tempo_experiencia')->nullable();
            $table->dateTime('data_criacao')->nullable();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

            $table->unique('area_atuacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('profissionais');
    }
}
