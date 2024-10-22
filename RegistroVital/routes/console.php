<?php

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;


Artisan::command('app:teste', function () {
    $this->comment('Aqui está uma frase inspiradora: ' . Inspiring::quote());
});

Artisan::command('app:reporte-de-envio-de-atividades', function () {
    $this->call('app:reporte-de-envio-de-atividades');
});


//app(Schedule::class)->command('app:teste')->everyFiveMinutes();
app(Schedule::class)->command('app:reporte-de-envio-de-atividades')->everyFiveMinutes();
