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
        Schema::create('Pacientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('datanascimento');
            $table->string('cep');
            $table->string('endereco');
            $table->string('numcartaocred');
            $table->string('hobbies');
            $table->string('doencascronicas');
            $table->string('remediosregulares');
            $table->string('meta_id')->nullable()->constrained('Metas')->onDelete('set null');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Pacientes');
    }
};
