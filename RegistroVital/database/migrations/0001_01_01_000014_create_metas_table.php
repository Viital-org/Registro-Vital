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
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained('pacientes', 'usuario_id')->onDelete('cascade');
            $table->string('titulo_meta', 20);
            $table->string('descricao_meta', 80)->nullable();
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->integer('situacao');
            $table->boolean('notificacao_diaria');
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
        Schema::dropIfExists('metas');
    }
};

