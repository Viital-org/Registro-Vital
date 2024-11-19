<?php

use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\AgendamentosController;
use App\Http\Controllers\AnotacoesSaudeController;
use App\Http\Controllers\AtuaAreasController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\DicasController;
use App\Http\Controllers\EspecializacaoProfissionalController;
use App\Http\Controllers\EspecializacoesController;
use App\Http\Controllers\HorarioAtendimentoController;
use App\Http\Controllers\MetasController;
use App\Http\Controllers\PacientesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfissionaisController;
use App\Http\Controllers\RelatoriosController;
use Illuminate\Support\Facades\Route;

require __DIR__ . '/auth.php';

Route::get('/registroprofissional/{especializacao_id}', [\App\Http\Controllers\Auth\RegisteredUserController::class, 'getEspecializacoes']);

Route::post('/redefinirsenha', [\App\Http\Controllers\Auth\PasswordResetLinkController::class, 'enviaEmail'])->name('emailredefinicao');

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

});

// Rotas Específicas para Pacientes
Route::middleware(['auth', 'tipo_usuario:1', 'layout.dinamico'])->group(function () {
    Route::get('/paciente/dashboard', [PacientesController::class, 'tela'])->name('paciente.dashboard');
    Route::get('/editarpaciente/{id}', [PacientesController::class, 'edit'])->name('pacientes.edit');
    Route::put('/editarpaciente/{id}', [PacientesController::class, 'update'])->name('pacientes-update');

    // Anotações
    Route::get('/anotacoes', [AnotacoesSaudeController::class, 'index'])->name('anotacoessaude-index');
    Route::get('/anotacoes/criar', [AnotacoesSaudeController::class, 'create'])->name('anotacoessaude-create');
    Route::post('/anotacoes', [AnotacoesSaudeController::class, 'store'])->name('anotacoessaude-store');
    Route::get('/anotacoes/editar/{id}', [AnotacoesSaudeController::class, 'edit'])->name('anotacoessaude-edit');
    Route::put('/anotacoes/{id}', [AnotacoesSaudeController::class, 'update'])->name('anotacoessaude-update');
    Route::delete('/anotacoes/{id}', [AnotacoesSaudeController::class, 'destroy'])->name('anotacoessaude-delete');

    //Dicas
    Route::resource('/cadastrodicas', DicasController::class);
    Route::get('/listadicas', [DicasController::class, 'index'])->name('dicas.index');
    Route::post('/guardardicas', [DicasController::class, 'store'])->name('dicas.store');
    Route::post('/listadicas', [DicasController::class, 'show'])->name('dicas.show');
    Route::get('/cadastrodica', [DicasController::class, 'create']);
    Route::get('/editardica/{id}', [DicasController::class, 'edit'])->name('dicas.edit');
    Route::put('/editardica/{id}', [DicasController::class, 'update'])->name('dicas.update');
    Route::delete('/listadicas/{id}', [DicasController::class, 'destroy'])->name('dicas.delete');

    //Metas
    Route::resource('metas', MetasController::class);
    Route::put('metas/{meta}/complete', [MetasController::class, 'complete'])->name('metas.complete');
    Route::put('metas/{meta}/increment', [MetasController::class, 'increment'])->name('metas.increment');
    Route::put('metas/{meta}/start', [MetasController::class, 'start'])->name('metas.start');

    //Relatorios
    Route::get('/relatorios_paciente', [RelatoriosController::class, 'relatorios_paciente'])->name('relatorios_paciente');
});

// Rotas Específicas para Profissionais
Route::middleware(['auth', 'tipo_usuario:2', 'layout.dinamico'])->group(function () {
    Route::get('/profissional/dashboard', [ProfissionaisController::class, 'tela'])->name('profissional.dashboard');
    Route::get('/cadastrarprof', [ProfissionaisController::class, 'create'])->name('cadastrarprof');
    Route::get('/editarprofissional', [ProfissionaisController::class, 'edit'])->name('profissionais-edit');
    Route::post('/editarprofissional', [ProfissionaisController::class, 'update'])->name('profissionais-update');

    Route::get('/especializacoes/{areaId}', [EspecializacoesController::class, 'getByArea']);
    Route::get('/especializacaoprofissional', [EspecializacaoProfissionalController::class, 'create'])->name('profissional.especializacoes');
    Route::get('/especializacaoprofissional/{area_atuacao_id}', [EspecializacaoProfissionalController::class, 'getEspecializacoes']);
    Route::post('/cadastraespecializacao', [EspecializacaoProfissionalController::class, 'store'])->name('especializacao-profissional-store');
    Route::get('/minhasespecializacoes', [EspecializacaoProfissionalController::class, 'index'])->name('minhasespecializacoes.index');
    Route::delete('/excluirespecializacao/{id}', [EspecializacaoProfissionalController::class, 'destroy'])->name('excluirespecializacao.destroy');

    //Horarios
    Route::get('/profissional/horarios/cadastrar/{id}', [HorarioAtendimentoController::class, 'create'])->name('horarios.cadastrar');
    Route::post('/profissional/horarios/store', [HorarioAtendimentoController::class, 'store'])->name('horarios.store');
    Route::get('/especializacoes/{id}/horarios', [HorarioAtendimentoController::class, 'listar'])->name('horarios.listar');
    Route::get('/profissional/horarios/{id}', [HorarioAtendimentoController::class, 'edit'])->name('horarios.edit');
    Route::put('/profissional/horarios/{id}', [HorarioAtendimentoController::class, 'update'])->name('horarios.update');
    Route::delete('/profissional/horarios/{id}', [HorarioAtendimentoController::class, 'destroy'])->name('horarios.destroy');

    Route::get('/listaprofissionais', [ProfissionaisController::class, 'index'])->name('profissionais-index');

    Route::get('/listapacientes', [PacientesController::class, 'index'])->name('pacientes.index');
    Route::post('/listapacientes', [PacientesController::class, 'show'])->name('pacientes.show');

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

});

Route::middleware(['auth', 'tipo_usuario:1,2', 'layout.dinamico'])->group(function () {
    //Consultas
    Route::resource('/cadastroconsultas', ConsultasController::class);
    Route::get('/listaconsultas', [ConsultasController::class, 'index'])->name('consultas-index');
    Route::post('/guardarconsultas', [ConsultasController::class, 'store'])->name('consultas-store');
    Route::post('/listaconsultas', [ConsultasController::class, 'show'])->name('consultas-show');
    Route::get('/cadastroconsul', [ConsultasController::class, 'create']);
    Route::get('/editarconsulta/{id}', [ConsultasController::class, 'edit'])->name('consultas-edit');
    Route::put('/editarconsulta/{id}', [ConsultasController::class, 'update'])->name('consultas-update');
    Route::delete('/listaconsultas/{id}', [ConsultasController::class, 'destroy'])->name('consultas-delete');
    Route::patch('/consultas/{id}/alterar-situacao', [ConsultasController::class, 'alterarSituacao'])->name('consultas.alterarSituacao');
    Route::patch('/consultas/{id}/iniciar', [ConsultasController::class, 'iniciar'])->name('consultas.iniciar');
    Route::patch('/consultas/{id}/finalizar', [ConsultasController::class, 'finalizar'])->name('consultas.finalizar');
    Route::get('/consultas/{id}/ativa', [ConsultasController::class, 'consultaAtiva'])->name('consultas.ativa');

    // Consultas
    Route::get('/consultas', [ConsultasController::class, 'index'])->name('consultas.index');
    Route::patch('/consultas/{id}', [ConsultasController::class, 'update'])->name('consultas.update');
    Route::get('/consultas/{id}', [ConsultasController::class, 'show'])->name('consultas.show');
    Route::delete('/consultas/{id}', [ConsultasController::class, 'destroy'])->name('consultas.destroy');
    Route::get('/consultas/{id}/anotacoes', [ConsultasController::class, 'listAnotacoes'])->name('consultas.anotacoes');

    // Agendamentos
    Route::get('/agendamentos', [AgendamentosController::class, 'index'])->name('agendamentos.index');
    Route::get('/agendamentos/create', [AgendamentosController::class, 'create'])->name('agendamentos.create');
    Route::post('/agendamentos', [AgendamentosController::class, 'store'])->name('agendamentos.store');
    Route::delete('/agendamentos/{id}', [AgendamentosController::class, 'destroy'])->name('agendamentos.destroy');
    Route::get('/agendamentos/especializacoes/{areaAtuacaoId}', [AgendamentosController::class, 'getEspecializacoes']);;
    Route::get('/agendamentos/profissionais/{areaAtuacaoId}/{especializacaoId}', [AgendamentosController::class, 'getProfissionaisPorEspecializacao']);
    Route::get('/agendamentos/endereco/{profissionalId}/{areaAtuacaoId}/{especializacaoId}', [AgendamentosController::class, 'getEnderecoPorProfissional']);
    Route::get('/dias-atendimento/{profissionalId}/{especializacaoId}/{areaAtuacaoId}', [AgendamentosController::class, 'getDiasdaSemana']);
    Route::get('/especializacao-profissional/{profissionalId}/{especializacaoId}/{areaAtuacaoId}', [AgendamentosController::class, 'getEspecializacaoProfissionalId']);
    Route::get('/horarios-disponiveis', [AgendamentosController::class, 'getHorariosDisponiveis']);
    Route::get('/valor-atendimento/{profissionalId}/{areaAtuacaoId}/{especializacaoId}/{enderecoId}', [AgendamentosController::class, 'getValorAtendimento']);

});

Route::middleware(['auth', 'tipo_usuario:3', 'layout.dinamico'])->group(function () {
    Route::get('/administrador/dashboard', [AdministradorController::class, 'tela'])->name('administrador.dashboard');
    Route::get('/logs/filter', [AdministradorController::class, 'showLogs'])->name('logs.filter');
    Route::get('/administrador/logs', [AdministradorController::class, 'showLogs'])->name('administrador.logs');

    //cria adm
    Route::get('/admin/profissionais', [AdministradorController::class, 'listarUsuarios'])->name('administrador.profissionais');
    Route::put('/admin/profissionais/{id}/transformar', [AdministradorController::class, 'transformarEmAdministrador'])->name('administrador.transformar');

    //Bloquear Usuario
    Route::put('/administrador/usuario/bloquear/{id}', [RegisteredUserController::class, 'bloquearUsuario'])->name('administrador.bloquear');

    //Relatorios
    Route::get('/relatorios_administrador', [RelatoriosController::class, 'relatorios_administrador'])->name('relatorios_administrador');

    Route::resource('/cadastroprofissional', ProfissionaisController::class);
    Route::post('/guardarprofissionais', [ProfissionaisController::class, 'store'])->name('profissionais-store');
    Route::post('/listaprofissionais', [ProfissionaisController::class, 'show'])->name('profissionais-show');
    Route::delete('/listaprofissionais/{id}', [ProfissionaisController::class, 'destroy'])->name('profissionais-delete');
    Route::get('/especializacoes/{areaId}', [ProfissionaisController::class, 'especializacoesPorArea']);

    //Pacientes
    Route::resource('/cadastropacientes', PacientesController::class);
    Route::post('/guardarpacientes', [PacientesController::class, 'store'])->name('pacientes-store');
    Route::post('/guardarpacientes', [PacientesController::class, 'store'])->name('pacientes-store');
    Route::get('/cadastropaci', [PacientesController::class, 'create']);
    Route::delete('/listapacientes/{id}', [PacientesController::class, 'destroy'])->name('pacientes-delete');



    //Areas de atuacao
    Route::resource('/cadastroatuaareas', AtuaAreasController::class);
    Route::get('/listaatuaareas', [AtuaAreasController::class, 'index'])->name('atuaareas-index');
    Route::post('/guardaratuaareas', [AtuaAreasController::class, 'store'])->name('atuaareas-store');
    Route::post('/listaatuaareas', [AtuaAreasController::class, 'show'])->name('atuareas-show');
    Route::get('/cadastroarea', [AtuaAreasController::class, 'create'])->name('atuareas-create');
    Route::get('/editaratuaarea/{id}', [AtuaAreasController::class, 'edit'])->name('atuaareas-edit');
    Route::put('/editaratuaarea/{id}', [AtuaAreasController::class, 'update'])->name('atuaareas-update');
    Route::delete('/listaatuaareas/{id}', [AtuaAreasController::class, 'destroy'])->name('atuaareas-delete');

    //Especializacoes
    Route::resource('/cadastroespecializacoes', EspecializacoesController::class);
    Route::get('/listaespecializacoes', [EspecializacoesController::class, 'index'])->name('especializacoes-index');
    Route::post('/guardarespecializacao', [EspecializacoesController::class, 'store'])->name('especializacoes-store');
    Route::post('/listaespecializacoes', [EspecializacoesController::class, 'show'])->name('especializacoes-show');
    Route::get('/cadastroespec', [EspecializacoesController::class, 'create'])->name('especializacoes-create');
    Route::get('/editarespecializacao/{id}', [EspecializacoesController::class, 'edit'])->name('especializacoes-edit');
    Route::put('/editarespecializacao/{id}', [EspecializacoesController::class, 'update'])->name('especializacoes-update');
    Route::delete('/listaespecializacoes/{id}', [EspecializacoesController::class, 'destroy'])->name('especializacoes-delete');


    //Dicas
    Route::resource('/cadastrodicas', DicasController::class);
    Route::get('/listadicas', [DicasController::class, 'index'])->name('dicas.index');
    Route::post('/guardardicas', [DicasController::class, 'store'])->name('dicas.store');
    Route::post('/listadicas', [DicasController::class, 'show'])->name('dicas.show');
    Route::get('/cadastrodica', [DicasController::class, 'create']);
    Route::get('/editardica/{id}', [DicasController::class, 'edit'])->name('dicas.edit');
    Route::put('/editardica/{id}', [DicasController::class, 'update'])->name('dicas.update');
    Route::delete('/listadicas/{id}', [DicasController::class, 'destroy'])->name('dicas.delete');

});
