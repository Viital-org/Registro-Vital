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
            $table->foreignId('tipo_meta_id')->constrained('tipo_metas');
            $table->date('data_inicio');
            $table->date('data_fim')->nullable();
            $table->string('unidade_metrica', 20);
            $table->integer('quantidade_alvo');
            $table->integer('progresso_atual')->default(0);
            $table->integer('maior_sequencia')->default(0);
            $table->integer('sequencia_atual')->default(0);
            $table->boolean('indefinida')->default(false);
            $table->integer('situacao')->default(0);
            $table->date('data_ultimo_reset')->nullable();
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
