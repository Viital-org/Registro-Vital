<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logs', function (Blueprint $table) {
            $table->increments('id_log');
            $table->string('tipo_log', 20);
            $table->string('tabela_afetada', 20)->nullable();
            $table->string('coluna_afetada', 20)->nullable();
            $table->string('valor_anterior', 100)->nullable();
            $table->string('valor_atual', 100)->nullable();
            $table->date('data_acao');
            $table->string('usuario', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logs');
    }
}

