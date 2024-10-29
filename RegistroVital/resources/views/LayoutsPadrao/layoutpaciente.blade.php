<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

    <!-- Importação de arquivos JavaScript e CSS com Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<aside class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar sidebar-admin">
        <div class="d-flex flex-column align-items-center sidebar-header p-4">
            <img src="{{ asset('/img/cruz.png') }}" alt="Logo Registro Vital" class="logo img-fluid mb-2">
            <h3 class="titulo text-white">Registro Vital</h3>
            <h5 class="titulo">Paciente</h5>
        </div>

        <ul class="nav flex-column links">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('paciente.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> 
                    <p class="p-nav">Home</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quemsomos') }}">
                    <i class="fas fa-users"></i>
                    <p class="p-nav">Quem somos</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ajuda') }}">
                    <i class="fas fa-question-circle"></i> 
                    <p class="p-nav">Ajuda</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('relatorios_paciente') }}">
                    <i class="fas fa-file-alt"></i> 
                    <p class="p-nav">Relatórios</p>
                </a>
            </li>
        </ul>

        <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="agendamentosDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Agendamentos</a>
                        <ul class="dropdown-menu" aria-labelledby="agendamentosDropdown">
                            <li><a class="dropdown-item" href="{{ route('agendamentos.create') }}">Agendar Consulta</a>
                            </li>
                            <li><a class="dropdown-item" href="{{ route('agendamentos.index') }}">Histórico de
                                    Agendamentos</a></li>
                            <li><a class="dropdown-item" href="{{ route('consultas.index') }}">Lista de Consultas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="anotacoesDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Anotações</a>
                        <ul class="dropdown-menu" aria-labelledby="anotacoesDropdown">
                            <li><a class="dropdown-item" href="{{ route('anotacoessaude-create') }}">Cadastrar
                                    Anotação</a></li>
                            <li><a class="dropdown-item" href="{{ route('anotacoessaude-index') }}">Listar Anotações</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="metasDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Metas</a>
                        <ul class="dropdown-menu" aria-labelledby="metasDropdown">
                            <li><a class="dropdown-item" href="{{ route('metas.create') }}">Cadastrar Meta</a></li>
                            <li><a class="dropdown-item" href="{{ route('metas.index') }}">Listar Metas</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        @auth
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->nome_completo }}</a>
                            <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                                <li>
                                    <form method="GET" action="{{ route('profile.edit') }}" id="edit-form">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Editar Perfil</button>
                                    </form>
                                </li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                        @csrf
                                        <button type="submit" class="dropdown-item">Sair</button>
                                    </form>
                                </li>
                            </ul>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Entrar</a>
                        @endauth
                    </li>
                </ul>

        <ul class="perfil nav flex-column links">
                <!-- Perfil Usuário -->
                <li class="user nav-item dropdown no-arrow">
                @auth
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('/img/avatar.png') }}" alt="Avatar do usuário" class="userImg img-fluid rounded-circle ms-2">
                        <span>{{ Auth::user()->nome_completo }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                        <li>
                            <a href="{{ route('profile.edit') }}" class="dropdown-item">Editar Perfil</a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="submit" class="dropdown-item">Sair</button>
                            </form>
                        </li>
                    </ul>
                @else
                    <a class="nav-link" href="{{ route('login') }}">
                        <i class="fas fa-sign-in-alt"></i> Entrar
                    </a>
                @endauth
            </li>
        </ul>
    </aside>

<!-- Conteúdo Principal -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
    @yield('conteudo')
</main>


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
