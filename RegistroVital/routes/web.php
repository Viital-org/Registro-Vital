<?php

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

require __DIR__ . '/auth.php';
Route::middleware('layout.dinamico')->group(function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/quemsomos', function () {
        return view('Cadastros/quemsomos');
    })->name('quemsomos');

    Route::get('/ajuda', function () {
        return view('Cadastros/ajuda');
    })->name('ajuda');
});

// Rotas Protegidas por Autenticação
Route::middleware(['auth', 'layout.dinamico'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/role', [ProfileController::class, 'updateRoleInfo'])->name('profile.updateRoleInfo');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Consultas
    Route::get('/consultas', [ConsultasController::class, 'index'])->name('consultas.index');
    Route::patch('/consultas/{id}', [ConsultasController::class, 'update'])->name('consultas.update');
    Route::get('/consultas/{id}', [ConsultasController::class, 'show'])->name('consultas.show');
    Route::delete('/consultas/{id}', [ConsultasController::class, 'destroy'])->name('consultas.destroy');
    Route::get('/consultas/{id}/anotacoes', [ConsultasController::class, 'listAnotacoes'])->name('consultas.anotacoes');
});

// Rotas Específicas para Pacientes
Route::middleware(['auth', 'tipo_usuario:1', 'layout.dinamico'])->group(function () {
    Route::get('/paciente/dashboard', [PacientesController::class, 'tela'])->name('paciente.dashboard');
    Route::get('/editarpaciente/{id}', [PacientesController::class, 'edit'])->name('pacientes-edit');
    Route::put('/editarpaciente/{id}', [PacientesController::class, 'update'])->name('pacientes-update');

    // Anotações
    Route::get('/anotacoes', [AnotacoesSaudeController::class, 'index'])->name('anotacoessaude-index');
    Route::get('/anotacoes/criar', [AnotacoesSaudeController::class, 'create'])->name('anotacoessaude-create');
    Route::post('/anotacoes', [AnotacoesSaudeController::class, 'store'])->name('anotacoessaude-store');
    Route::get('/anotacoes/{id}/editar', [AnotacoesSaudeController::class, 'edit'])->name('anotacoessaude-edit');
    Route::put('/anotacoes/{id}', [AnotacoesSaudeController::class, 'update'])->name('anotacoessaude-update');
    Route::delete('/anotacoes/{id}', [AnotacoesSaudeController::class, 'destroy'])->name('anotacoessaude-delete');

    // Agendamentos
    Route::get('/agendamentos', [AgendamentosController::class, 'index'])->name('agendamentos.index');
    Route::get('/agendamentos/create', [AgendamentosController::class, 'create'])->name('agendamentos.create');
    Route::post('/agendamentos', [AgendamentosController::class, 'store'])->name('agendamentos.store');
    Route::delete('/agendamentos/{id}', [AgendamentosController::class, 'destroy'])->name('agendamentos.destroy');
});

// Rotas Específicas para Profissionais
Route::middleware(['auth', 'tipo_usuario:2', 'layout.dinamico'])->group(function () {
    Route::get('/medico/dashboard', [ProfissionaisController::class, 'tela'])->name('medico.dashboard');
    Route::get('/cadastrarprof', [ProfissionaisController::class, 'create'])->name('cadastrarprof');
    Route::get('/editarprofissional', [ProfissionaisController::class, 'edit'])->name('profissionais-edit');
    Route::post('/editarprofissional', [ProfissionaisController::class, 'update'])->name('profissionais-update');

    Route::get('/especializacoes/{areaId}', [EspecializacoesController::class, 'getByArea']);
});

// Rotas Específicas para Administradores
Route::middleware(['auth', 'tipo_usuario:3', 'layout.dinamico'])->group(function () {
    // Aqui você pode definir rotas específicas para o administrador
});


