<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->increments('id_documento');
            $table->integer('id_anotacao')->unsigned();
            $table->string('tipo_documeto', 3)->nullable();
            $table->string('path_documento', 100);
            $table->integer('tamanho_documento_kb');
            $table->timestamps();

            $table->foreign('id_anotacao')->references('id_anotacao')->on('anotacoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documentos');
    }
}

