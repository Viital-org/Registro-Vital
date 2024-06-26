<?php

use App\Http\Controllers\AgendamentoPacienteController;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\AnotacoesSaudeController;
use App\Http\Controllers\AtuaAreasController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\DicasController;
use App\Http\Controllers\EspecializacoesController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\TipoAnotacoesController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/paciente/dashboard', [PacientesController::class, 'Tela'])
        ->name('paciente.dashboard');
});

Route::middleware(['auth', 'role'])->group(function () {
    Route::get('/medico/dashboard', [ProfissionaisController::class, 'Tela'])
       ->name('medico.dashboard');
});




//Profissionais
Route::resource('/cadastroprofissional', ProfissionaisController::class);
Route::get('/listaprofissionais', [ProfissionaisController::class, 'index'])->name('profissionais-index');
Route::post('/guardarprofissionais', [ProfissionaisController::class, 'store'])->name('profissionais-store');
Route::post('/listaprofissionais', [ProfissionaisController::class, 'show'])->name('profissionais-show');
Route::get('/cadastrarprof', [ProfissionaisController::class, 'create']);
Route::get('/editarprofissional/{id}', [ProfissionaisController::class, 'edit'])->name('profissionais-edit');
Route::put('/editarprofissional/{id}', [ProfissionaisController::class, 'update'])->name('profissionais-update');
Route::delete('/listaprofissionais/{id}', [ProfissionaisController::class, 'destroy'])->name('profissionais-delete');
Route::get('/especializacoes/{areaId}', [ProfissionaisController::class, 'especializacoesPorArea']);

//Pacientes
Route::resource('/cadastropacientes', PacientesController::class);
Route::get('/listapacientes', [PacientesController::class, 'index'])->name('pacientes-index');
Route::post('/guardarpacientes', [PacientesController::class, 'store'])->name('pacientes-store');
Route::post('/listapacientes', [PacientesController::class, 'show'])->name('pacientes-show');
Route::get('/cadastropaci', [PacientesController::class, 'create']);
Route::get('/editarpaciente/{id}', [PacientesController::class, 'edit'])->name('pacientes-edit');
Route::put('/editarpaciente/{id}', [PacientesController::class, 'update'])->name('pacientes-update');
Route::delete('/listapacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes-delete');

//Consultas
Route::resource('/cadastroconsultas', ConsultasController::class);
Route::get('/listaconsultas', [ConsultasController::class, 'index'])->name('consultas-index');
Route::post('/guardarconsultas', [ConsultasController::class, 'store'])->name('consultas-store');
Route::post('/listaconsultas', [ConsultasController::class, 'show'])->name('consultas-show');
Route::get('/cadastroconsul', [ConsultasController::class, 'create']);
Route::get('/editarconsulta/{id}', [ConsultasController::class, 'edit'])->name('consultas-edit');
Route::put('/editarconsulta/{id}', [ConsultasController::class, 'update'])->name('consultas-update');
Route::delete('/listaconsultas/{id}', [ConsultasController::class, 'destroy'])->name('consultas-delete');

//Areas de atuacao
Route::resource('/cadastroatuaareas', AtuaAreasController::class);
Route::get('/listaatuaareas', [AtuaAreasController::class, 'index'])->name('atuaareas-index');
Route::post('/guardaratuaareas', [AtuaAreasController::class, 'store'])->name('atuaareas-store');
Route::post('/listaatuaareas', [AtuaAreasController::class, 'show'])->name('atuareas-show');
Route::get('/cadastroarea', [AtuaAreasController::class, 'create']);
Route::get('/editaratuaarea/{id}', [AtuaAreasController::class, 'edit'])->name('atuaareas-edit');
Route::put('/editaratuaarea/{id}', [AtuaAreasController::class, 'update'])->name('atuaareas-update');
Route::delete('/listaatuaareas/{id}', [AtuaAreasController::class, 'destroy'])->name('atuaareas-delete');

//Especializacoes
Route::resource('/cadastroespecializacoes', EspecializacoesController::class);
Route::get('/listaespecializacoes', [EspecializacoesController::class, 'index'])->name('especializacoes-index');
Route::post('/guardarespecializacao', [EspecializacoesController::class, 'store'])->name('especializacoes-store');
Route::post('/listaespecializacoes', [EspecializacoesController::class, 'show'])->name('especializacoes-show');
Route::get('/cadastroespec', [EspecializacoesController::class, 'create']);
Route::get('/editarespecializacao/{id}', [EspecializacoesController::class, 'edit'])->name('especializacoes-edit');
Route::put('/editarespecializacao/{id}', [EspecializacoesController::class, 'update'])->name('especializacoes-update');
Route::delete('/listaespecializacoes/{id}', [EspecializacoesController::class, 'destroy'])->name('especializacoes-delete');

//Agendamentos
Route::resource('/cadastroagendamentos', AgendamentosController::class);
Route::get('/listaagendamentos', [AgendamentosController::class, 'index'])->name('agendamentos-index');
Route::post('/listaagendamentos', [AgendamentosController::class, 'show'])->name('agendamentos-show');
Route::delete('/listaagendamentos/{id}', [AgendamentosController::class, 'destroy'])->name('agendamentos-delete');

//Agendamentos Paciente
Route::get('/listaagendamentopaciente', [AgendamentoPacienteController::class, 'index'])->name('agendamentos-paciente-index');
Route::post('/listaagendamentopaciente', [AgendamentoPacienteController::class, 'show'])->name('agendamentos-paciente-show');

//Tipos de anotacao
Route::resource('/cadastrotipoanotacao', TipoAnotacoesController::class);
Route::get('/listatipoanotacoes', [TipoAnotacoesController::class, 'index'])->name('tipoanotacao-index');
Route::post('/guardartioanotacao', [TipoAnotacoesController::class, 'store'])->name('tipoanotacao-store');
Route::post('/listatipoanotacoes', [TipoAnotacoesController::class, 'show'])->name('tipoanotacao-show');
Route::get('/cadastrotipanot', [TipoAnotacoesController::class, 'create'])->name('tipoanotacao-create');
Route::get('/editartipoanotacao/{id}', [TipoAnotacoesController::class, 'edit'])->name('tipoanotacao-edit');
Route::put('/editartipoanotacao/{id}', [TipoAnotacoesController::class, 'update'])->name('tipoanotacao-update');
Route::delete('/listatipoanotacoes/{id}', [TipoAnotacoesController::class, 'destroy'])->name('tipoanotacao-delete');

//Anotacoes
Route::resource('/cadastroanotacoes', AnotacoesSaudeController::class);
Route::get('/listaanotacoes', [AnotacoesSaudeController::class, 'index'])->name('anotacoessaude-index');
Route::post('/guardaranotacoes', [AnotacoesSaudeController::class, 'store'])->name('anotacoessaude-store');
Route::post('/listaranotacoes', [AnotacoesSaudeController::class, 'show'])->name('anotacoessaude-show');
Route::get('/cadastroanotacoes', [AnotacoesSaudeController::class, 'create']);
Route::get('/editaranotacao/{id}', [AnotacoesSaudeController::class, 'edit'])->name('anotacoessaude-edit');
Route::put('/editaranotacao/{id}', [AnotacoesSaudeController::class, 'update'])->name('anotacoessaude-update');
Route::delete('/listaanotacoes/{id}', [AnotacoesSaudeController::class, 'destroy'])->name('anotacoessaude-delete');

//Dicas
Route::resource('/cadastrodicas', DicasController::class);
Route::get('/listadicas', [DicasController::class, 'index'])->name('dicas-index');
Route::post('/guardardicas', [DicasController::class, 'store'])->name('dicas-store');
Route::post('/listadicas', [DicasController::class, 'show'])->name('dicas-show');
Route::get('/cadastrodica', [DicasController::class, 'create']);
Route::get('/editardica/{id}', [DicasController::class, 'edit'])->name('dicas-edit');
Route::put('/editardica/{id}', [DicasController::class, 'update'])->name('dicas-update');
Route::delete('/listadicas/{id}', [DicasController::class, 'destroy'])->name('dicas-delete');

//Metas
Route::resource('/cadastrometas', MetasController::class);
Route::get('/listametas', [MetasController::class, 'index'])->name('metas-index');
Route::post('/guardarmetas', [MetasController::class, 'store'])->name('metas-store');
Route::post('/listametas', [MetasController::class, 'show'])->name('metas-show');
Route::get('/cadastrometa', [MetasController::class, 'create']);
Route::get('/editarmeta/{id}', [MetasController::class, 'edit'])->name('metas-edit');
Route::put('/editarmeta/{id}', [MetasController::class, 'update'])->name('metas-update');
Route::delete('/listametas/{id}', [MetasController::class, 'destroy'])->name('metas-delete');

