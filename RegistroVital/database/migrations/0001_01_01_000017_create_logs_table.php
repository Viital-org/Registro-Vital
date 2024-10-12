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
        Schema::create('logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo_log')->constrained('tipos_log')->onDelete('cascade');
            $table->string('tabela_afetada', 20)->nullable();
            $table->string('coluna_afetada', 20)->nullable();
            $table->string('valor_anterior', 100)->nullable();
            $table->string('valor_atual', 100)->nullable();
            $table->dateTime('data_acao');
            $table->foreignId('usuario_id')->constrained('usuarios')->onDelete('cascade');
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
        Schema::dropIfExists('logs');
    }
};

