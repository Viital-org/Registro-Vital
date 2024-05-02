<?php

use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\AnotacoesSaudeController;
use App\Http\Controllers\AtuaAreasController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\DicasController;
use App\Http\Controllers\EspecializacoesController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\TipoAnotacoesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

//Profissionais
Route::resource('/cadastroprofissional', ProfissionaisController::class);
Route::get('/listaprofissionais', [ProfissionaisController::class, 'index'])->name('profissionais-index');
Route::post('/listaprofissionais', [ProfissionaisController::class, 'store'])->name('profissionais-store');
Route::get('/cadastrarprof', [ProfissionaisController::class, 'create']);
Route::get('/editarprofissional/{id}', [ProfissionaisController::class, 'edit'])->name('profissionais-edit');
Route::put('/editarprofissional/{id}', [ProfissionaisController::class, 'update'])->name('profissionais-update');
Route::delete('/listaprofissionais/{id}', [ProfissionaisController::class, 'destroy'])->name('profissionais-delete');
Route::get('/especializacoes/{areaId}', [ProfissionaisController::class, 'especializacoesPorArea']);

//Pacientes
Route::resource('/cadastropacientes', PacientesController::class);
Route::get('/listapacientes', [PacientesController::class, 'index'])->name('pacientes-index');
Route::post('/listapacientes', [PacientesController::class, 'store'])->name('pacientes-store');
Route::get('/cadastropaci', [PacientesController::class, 'create']);
Route::get('/editarpaciente/{id}', [PacientesController::class, 'edit'])->name('pacientes-edit');
Route::put('/editarpaciente/{id}', [PacientesController::class, 'update'])->name('pacientes-update');
Route::delete('/listapacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes-delete');

//Consultas
Route::resource('/cadastroconsultas', ConsultasController::class);
Route::get('/listaconsultas', [ConsultasController::class, 'index'])->name('consultas-index');
Route::post('/listaconsultas', [ConsultasController::class, 'store'])->name('consultas-store');
Route::get('/cadastroconsul', [ConsultasController::class, 'create']);
Route::get('/editarconsulta/{id}', [ConsultasController::class, 'edit'])->name('consultas-edit');
Route::put('/editarconsulta/{id}', [ConsultasController::class, 'update'])->name('consultas-update');
Route::delete('/listaconsultas/{id}', [ConsultasController::class, 'destroy'])->name('consultas-delete');

//Areas de atuacao
Route::resource('/cadastroatuaareas', AtuaAreasController::class);
Route::get('/listaatuaareas', [AtuaAreasController::class, 'index'])->name('atuaareas-index');
Route::post('/listaatuaareas', [AtuaAreasController::class, 'store'])->name('atuaareas-store');
Route::get('/cadastroarea', [AtuaAreasController::class, 'create']);
Route::get('/editaratuaarea/{id}', [AtuaAreasController::class, 'edit'])->name('atuaareas-edit');
Route::put('/editaratuaarea/{id}', [AtuaAreasController::class, 'update'])->name('atuaareas-update');
Route::delete('/listaatuaareas/{id}', [AtuaAreasController::class, 'destroy'])->name('atuaareas-delete');

//Especializacoes
Route::resource('/cadastroespecializacoes', EspecializacoesController::class);
Route::get('/listaespecializacoes', [EspecializacoesController::class, 'index'])->name('especializacoes-index');
Route::post('/listaespecializacoes', [EspecializacoesController::class, 'store'])->name('especializacoes-store');
Route::get('/cadastroespec', [EspecializacoesController::class, 'create']);
Route::get('/editarespecializacao/{id}', [EspecializacoesController::class, 'edit'])->name('especializacoes-edit');
Route::put('/editarespecializacao/{id}', [EspecializacoesController::class, 'update'])->name('especializacoes-update');
Route::delete('/listaespecializacoes/{id}', [EspecializacoesController::class, 'destroy'])->name('especializacoes-delete');

//Agendamentos

Route::resource('/cadastroagendamentos', AgendamentosController::class);
Route::get('/listaagendamentos', [AgendamentosController::class, 'index'])->name('agendamentos-index');
Route::delete('/listaagendamentos/{id}', [AgendamentosController::class, 'destroy'])->name('agendamentos-delete');

//Tipos de anotacao
Route::resource('/cadastrotipoanotacao', TipoAnotacoesController::class);
Route::get('/listatipoanotacoes', [TipoAnotacoesController::class, 'index'])->name('tipoanotacao-index');
Route::post('/listatipoanotacoes', [TipoAnotacoesController::class, 'store'])->name('tipoanotacao-store');
Route::get('/cadastrotipanot', [TipoAnotacoesController::class, 'create'])->name('tipoanotacao-create');
Route::get('/editartipoanotacao/{id}', [TipoAnotacoesController::class, 'edit'])->name('tipoanotacao-edit');
Route::put('/editartipoanotacao/{id}', [TipoAnotacoesController::class, 'update'])->name('tipoanotacao-update');
Route::delete('/listatipoanotacoes/{id}', [TipoAnotacoesController::class, 'destroy'])->name('tipoanotacao-delete');

//Anotacoes
Route::resource('/cadastroanotacoes', AnotacoesSaudeController::class);
Route::get('/listaanotacoes', [AnotacoesSaudeController::class, 'index'])->name('anotacoessaude-index');
Route::post('/listaanotacoes', [AnotacoesSaudeController::class, 'store'])->name('anotacoessaude-store');
Route::get('/cadastroanotacoes', [AnotacoesSaudeController::class, 'create']);
Route::get('/editaranotacao/{id}', [AnotacoesSaudeController::class, 'edit'])->name('anotacoessaude-edit');
Route::put('/editaranotacao/{id}', [AnotacoesSaudeController::class, 'update'])->name('anotacoessaude-update');
Route::delete('/listaanotacoes/{id}', [AnotacoesSaudeController::class, 'destroy'])->name('anotacoessaude-delete');

//Dicas
Route::resource('/cadastrodicas', DicasController::class);
Route::get('/listadicas', [DicasController::class, 'index'])->name('dicas-index');
Route::post('/listadicas', [DicasController::class, 'store'])->name('dicas-store');
Route::get('/cadastrodica', [DicasController::class, 'create']);
Route::get('/editardica/{id}', [DicasController::class, 'edit'])->name('dicas-edit');
Route::put('/editardica/{id}', [DicasController::class, 'update'])->name('dicas-update');
Route::delete('/listadicas/{id}', [DicasController::class, 'destroy'])->name('dicas-delete');
