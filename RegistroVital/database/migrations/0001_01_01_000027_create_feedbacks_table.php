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
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('id_consulta');
            $table->unsignedBigInteger('usuario_avaliador');
            $table->unsignedBigInteger('usuario_avaliado');
            $table->tinyInteger('nota_feedback');
            $table->string('observacao', 50)->nullable();
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('id_consulta')->references('id')->on('consultas')->onDelete('cascade');
            $table->foreign('usuario_avaliador')->references('id')->on('usuarios')->onDelete('cascade');
            $table->foreign('usuario_avaliado')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
}
