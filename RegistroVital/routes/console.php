<?php

use App\Console\Commands\AtualizaMetas;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('app:teste', function () {
    $this->comment('Aqui está uma frase inspiradora: ' . Inspiring::quote());
});

Artisan::command('app:atualizar-metas-diariamente', function () {
    $this->call(AtualizaMetas::class);
})->daily();
