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
    public function up()
    {
        Schema::create('enderecos_atuacao', function (Blueprint $table) {
            $table->increments('id_endereco');
            $table->integer('id_profissional')->unsigned();
            $table->string('area_atuacao', 20);
            $table->integer('situacao_endereco');
            $table->string('endereco', 30);
            $table->string('numero_endereco', 10);
            $table->string('cep', 8);
            $table->string('cidade', 32);
            $table->string('estado', 2);
            $table->timestamps();

            $table->foreign('id_profissional')->references('id_profissional')->on('profissionais')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('enderecos_atuacao');
    }
}
