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
        Schema::create('Especializacoes', function (Blueprint $table) {
            $table->id();
            $table->string('especializacao');
            $table->integer('tempoespecializacao');
            $table->foreignId('area_id')->constrained('Atuaareas')->onDelete('cascade');
            $table->text('descricao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Especializacoes');
    }
};
