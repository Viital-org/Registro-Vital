<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('administradores', function (Blueprint $table) {
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade')->primary();
            $table->string('cargo', 40)->nullable();
            $table->dateTime('data_criacao')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('administradores');
    }
};
