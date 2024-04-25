<?php

use App\Http\Controllers\Profissionais;
use App\Http\Controllers\ProfissionaisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/cadastroprofissional',ProfissionaisController::class);