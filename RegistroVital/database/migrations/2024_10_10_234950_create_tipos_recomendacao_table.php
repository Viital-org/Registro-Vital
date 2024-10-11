<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTiposRecomendacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipos_recomendacao', function (Blueprint $table) {
            $table->increments('id_tipo_recomendacao');
            $table->string('DESCRICAO', 40)->nullable();
            $table->char('GERA_NOTIFICACAO', 1)->nullable();

            $table->primary('id_tipo_recomendacao');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipos_recomendacao');
    }
}

