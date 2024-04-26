<?php

use App\Http\Controllers\Profissionais;
use App\Http\Controllers\ProfissionaisController;
use Illuminate\Support\Facades\Route;

Route::resource('/',ProfissionaisController::class);

Route::resource('/cadastroprofissional',ProfissionaisController::class);

Route::resource('/listaprofissionais',ProfissionaisController::class);

Route::get('/cadastrarprof',[ProfissionaisController::class, 'create']);

Route::POST('/',[ProfissionaisController::class, 'store'])->name('profissionais-store');
Route::get('/{id}/edit',[ProfissionaisController::class, 'edit'])->where('id','[0,9]+')->name('profissionais-edit');