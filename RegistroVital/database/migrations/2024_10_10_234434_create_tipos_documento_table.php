<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposDocumentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_documento', function (Blueprint $table) {
            $table->increments('id_tipo_documento');
            $table->string('extensao_documento', 3)->nullable();
            $table->integer('tamanho_maximo_kb');

            $table->primary('id_tipo_documento');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_documento');
    }
}

