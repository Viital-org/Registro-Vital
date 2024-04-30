<?php

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
        Schema::create('Agendamentos', function(Blueprint $table){
            $table->id();
            $table->string('especialidade'); //ADICIONAR A CHAVE ESTRANGEIRA
            $table->foreignId('idprofissional')->constrained('profissional')->onDelete('cascade');
            $table->foreignId('idpaciente')->constrained('paciente')->onDelete('cascade'); 
            $table->date('data');
            $table->foreignId('consulta')->constrained('consulta')->onDelete('cascade');
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
