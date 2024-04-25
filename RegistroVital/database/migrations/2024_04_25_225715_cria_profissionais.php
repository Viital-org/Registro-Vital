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
        Schema::create('Profissionais', function (Blueprint $tabela){
            $tabela->id();
            $tabela->string('areaatuacao',40);
            $tabela->string('email',40);
            $tabela->string('enderecoatual',60);
            $tabela->string('localformacao',60);
            $tabela->date('dataformacao');
            $tabela->string('descricaoperfil');
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
