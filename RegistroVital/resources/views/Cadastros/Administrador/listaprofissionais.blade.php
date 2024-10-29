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
                    <button class="btn btn-danger mt-2">
                        <i class="fas fa-ban"></i> Bloquear Usuário
                    </button>

                    @if ($usuario->tipo_usuario == 2)
                        <form action="{{ route('administrador.transformar', $usuario->id) }}" method="POST" onsubmit="return confirm('Você tem certeza que deseja transformar este profissional de saúde em um administrador do sistema? Esta ação é irreversível. Caso deseje cadastrar este profissional de saúde novamente, um novo registro deverá ser feito.')">
                            @csrf
                            @method('PUT')

                            <!-- Checkbox para mostrar campos adicionais -->
                            <div class="form-check mt-3">
                                <input type="checkbox" class="form-check-input" id="alterarTipoCheckbox-{{ $usuario->id }}" onclick="toggleTransformForm({{ $usuario->id }})">
                                <label class="form-check-label" for="alterarTipoCheckbox-{{ $usuario->id }}">Alterar tipo de usuário</label>
                            </div>

                            <!-- Campos de cargo e botão de transformação (ocultos por padrão) -->
                            <div id="transformForm-{{ $usuario->id }}" style="display: none;">
                                <div class="form-group mt-3">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" name="cargo" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-warning mt-2">Transformar em Administrador</button>
                            </div>
                        </form>
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

<!-- JavaScript para mostrar/ocultar os campos de cargo e botão -->
<script>
    function toggleTransformForm(id) {
        const formSection = document.getElementById(`transformForm-${id}`);
        const checkbox = document.getElementById(`alterarTipoCheckbox-${id}`);

        formSection.style.display = checkbox.checked ? 'block' : 'none';
    }
</script>
