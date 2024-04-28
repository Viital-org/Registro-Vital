<?php

use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfissionaisController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/cadastroprofissional', ProfissionaisController::class);
Route::get('/listaprofissionais', [ProfissionaisController::class, 'index'])->name('profissionais-index');
Route::post('/listaprofissionais', [ProfissionaisController::class, 'store'])->name('profissionais-store');
Route::get('/cadastrarprof', [ProfissionaisController::class, 'create']);
Route::get('/editarprofissional/{id}', [ProfissionaisController::class, 'edit'])->name('profissionais-edit');
Route::put('/editarprofissional/{id}', [ProfissionaisController::class, 'update'])->name('profissionais-update');
Route::delete('/listaprofissionais/{id}', [ProfissionaisController::class, 'destroy'])->name('profissionais-delete');

Route::resource('/cadastropacientes', PacientesController::class);
Route::get('/listapacientes', [PacientesController::class, 'index'])->name('pacientes-index');
Route::post('/listapacientes', [PacientesController::class, 'store'])->name('pacientes-store');
Route::get('/cadastropaci', [PacientesController::class, 'create']);
Route::get('/editarpaciente/{id}', [PacientesController::class, 'edit'])->name('pacientes-edit');
Route::put('/editarpaciente/{id}', [PacientesController::class, 'update'])->name('pacientes-update');
Route::delete('/listapacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes-delete');

Route::resource('/cadastroconsultas', ConsultasController::class);
Route::get('/listaconsultas', [ConsultasController::class, 'index'])->name('consultas-index');
Route::post('/listaconsultas', [ConsultasController::class, 'store'])->name('consultas-store');
Route::get('/cadastroconsul', [ConsultasController::class, 'create']);
Route::get('/editarconsulta/{id}', [ConsultasController::class, 'edit'])->name('consultas-edit');
Route::put('/editarconsulta/{id}', [ConsultasController::class, 'update'])->name('consultas-update');
Route::delete('/listaconsultas/{id}', [ConsultasController::class, 'destroy'])->name('consultas-delete');
