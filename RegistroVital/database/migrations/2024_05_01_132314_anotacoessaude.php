<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anotacoessaude', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('paciente_id');
            $table->date('data_anotacao');
            $table->integer('tipo_anot');
            $table->string('visibilidade');
            $table->text('anotacao');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('paciente_id')->references('id')->on('pacientes');
            $table->foreign('tipo_anot')->references('id')->on('tipoanotacoes');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anotacoessaude');
    }
};
