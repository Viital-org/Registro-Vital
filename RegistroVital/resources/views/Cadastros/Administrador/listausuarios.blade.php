@extends($layout)

@section('titulo', 'Lista de Usuários')

@section('conteudo')
    <div class="container mt-5">
        <h1 class="text-center">Usuários do Sistema</h1>

        <!-- Opções de filtro para tipos de usuários -->
        <div class="d-flex justify-content-center my-3">
            <a href="{{ route('administrador.profissionais') }}" class="btn btn-primary {{ is_null($tipoUsuario) ? 'active' : '' }}">
                Listar Todos
            </a>
            <a href="{{ route('administrador.profissionais', ['tipo_usuario' => 1]) }}" class="btn btn-info {{ $tipoUsuario == 1 ? 'active' : '' }} ml-2">
                Listar Pacientes
            </a>
            <a href="{{ route('administrador.profissionais', ['tipo_usuario' => 2]) }}" class="btn btn-primary {{ $tipoUsuario == 2 ? 'active' : '' }} ml-2">
                Listar Profissionais
            </a>
            <a href="{{ route('administrador.profissionais', ['tipo_usuario' => 3]) }}" class="btn btn-secondary {{ $tipoUsuario == 3 ? 'active' : '' }} ml-2">
                Listar Administradores
            </a>
        </div>

        @forelse ($usuarios as $usuario)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $usuario->nome }}</h5>
                    <p><strong>Email:</strong> {{ $usuario->email }}</p>
                    <p><strong>Tipo de Usuário:</strong>
                        @if ($usuario->tipo_usuario == 1)
                            Paciente
                        @elseif ($usuario->tipo_usuario == 2)
                            Profissional
                        @else
                            Administrador
                        @endif
                    </p>

                    <!-- Botão de bloquear usuário -->
                    <button
                        class="btn {{ $usuario->situacao_cadastro === 1 ? 'btn-danger' : 'btn-success' }} mt-2"
                        onclick="event.preventDefault(); document.getElementById('bloquear-form-{{ $usuario->id }}').submit();">
                        <i class="fas fa-ban"></i>
                        {{ $usuario->situacao_cadastro === 1 ? 'Bloquear Usuário' : 'Desbloquear Usuário' }}
                    </button>

                    <form id="bloquear-form-{{ $usuario->id }}" action="{{ route('administrador.bloquear', $usuario->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('PUT')
                    </form>

                    @if ($usuario->tipo_usuario == 2)
                        <!-- Botão para abrir o modal -->
                        <button type="button" class="btn btn-warning mt-2" data-bs-toggle="modal" data-bs-target="#transformModal-{{ $usuario->id }}">
                            Transformar em Administrador
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="transformModal-{{ $usuario->id }}" tabindex="-1" aria-labelledby="transformModalLabel-{{ $usuario->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="transformModalLabel-{{ $usuario->id }}">Transformar em Administrador</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('administrador.transformar', $usuario->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <p align="justify">Você tem certeza que deseja <b>transformar este profissional de saúde em um administrador</b> do sistema? Esta ação é <b>irreversível</b>. Caso deseje cadastrar este profissional de saúde novamente, um novo registro deverá ser feito.</p>

                                            <div class="form-group">
                                                <label for="cargo">Cargo Do Aministrador:</label>
                                                <input type="text" name="cargo" class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-warning">Transformar em Administrador</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @empty
            <p class="text-center mt-5">Não há {{ is_null($tipoUsuario) ? 'usuários' : ($tipoUsuario == 1 ? 'pacientes' : ($tipoUsuario == 2 ? 'profissionais' : 'administradores')) }} cadastrados no momento.</p>
        @endforelse

        <!-- Paginação -->
        <div class="d-flex justify-content-center mt-4">
            {{ $usuarios->links() }}
        </div>
    </div>
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
