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
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('consulta_id')->contrained('consultas')->onDelete('cascade');
            $table->foreignId('usuario_avaliador')->constrained('usuarios')->onDelete('cascade');
            $table->foreignId('usuario_avaliado')->constrained('usuarios')->onDelete('cascade');
            $table->tinyInteger('nota_feedback')->checkBetween(0, 10);
            $table->string('observacao', 50)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
