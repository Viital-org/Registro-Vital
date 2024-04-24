<?php

use App\Http\Controllers\Profissionais;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/cadastroprofissional',Profissionais::class);