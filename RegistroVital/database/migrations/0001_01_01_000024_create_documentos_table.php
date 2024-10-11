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
    public function up(): void
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('anotacao_id')->unsigned();
            $table->string('tipo_documeto', 3)->nullable();
            $table->string('path_documento', 100);
            $table->integer('tamanho_documento_kb');
            $table->timestamps();

            $table->foreign('anotacao_id')->references('id')->on('anotacoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
}

