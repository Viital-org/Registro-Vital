<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedbacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id_feedback');
            $table->unsignedInteger('id_consulta');
            $table->unsignedInteger('usuario_avaliador');
            $table->unsignedInteger('usuario_avaliado');
            $table->tinyInteger('nota_feedback');
            $table->string('observacao', 50)->nullable();
            $table->timestamps();

            // chaves estrangeiras
            // $table->foreign('id_consulta')->references('id_consulta')->on('consultas');
            // $table->foreign('usuario_avaliador')->references('id')->on('usuarios');
            // $table->foreign('usuario_avaliado')->references('id')->on('usuarios');
            $table->check('nota_feedback >= 0 AND nota_feedback <= 10');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
