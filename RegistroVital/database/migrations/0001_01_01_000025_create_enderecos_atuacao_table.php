<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosAtuacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('enderecos_atuacao', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('profissional_id');
            $table->string('area_atuacao', 20);
            $table->integer('situacao_endereco');
            $table->string('endereco', 30);
            $table->string('numero_endereco', 10);
            $table->string('cep', 8);
            $table->string('cidade', 32);
            $table->string('estado', 2);
            $table->timestamps();

            $table->foreign('profissional_id')->references('usuario_id')->on('profissionais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos_atuacao');
    }
}
