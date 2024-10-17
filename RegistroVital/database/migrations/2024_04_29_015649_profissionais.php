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
        Schema::create('Profissionais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nome', 70);
            $table->foreignId('areaatuacao_id')->nullable()->constrained('Atuaareas')->onDelete('set null');
            $table->foreignId('especializacao_id')->nullable()->constrained('Especializacoes')->onDelete('set null');
            $table->string('email', 40);
            $table->string('enderecoatuacao', 80)->nullable();
            $table->string('localformacao', 60)->nullable();
            $table->date('dataformacao')->nullable();
            $table->text('descricaoperfil')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Profissionais');
    }
};
