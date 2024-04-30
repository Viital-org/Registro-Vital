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
        Schema::create('Consultas', function (Blueprint $table) {
            $table->id();
            $table->date('data');
            $table->string('status');
            $table->string('especialidade');
            $table->float('valor');
            $table->foreignId('profissional_id')->constrained('Profissionais')->onDelete('cascade');
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Consultas');
    }
};
