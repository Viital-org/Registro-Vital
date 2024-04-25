<?php

use GuzzleHttp\Promise\Create;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Profissionais', function (Blueprint $table){
            $table->id();
            $table->string('areaatuacao',40);
            $table->string('email',40);
            $table->string('enderecoatual',60);
            $table->string('localformacao',60);
            $table->date('dataformacao');
            $table->string('descricaoperfil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
