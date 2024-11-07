<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da página dinâmico -->
    <title>@yield('titulo')</title>

    <!-- Importação de arquivos JavaScript e CSS com Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Se o Bootstrap já estiver no app.scss, remova esta linha -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Sidebar -->
<aside class="bg-gradient-primary sidebar-profissional sidebar-dark accordion" id="accordionSidebar sidebar">
    <div class="d-flex flex-column align-items-center sidebar-header p-4">
        <img src="{{ asset('/img/cruz.png') }}" alt="Logo Registro Vital" class="logo img-fluid mb-2">
        <h3 class="titulo text-white">Registro Vital</h3>
        <h5 class="titulo">Médico</h5>
    </div>

    <ul class="nav flex-column links">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profissional.dashboard') }}">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('quemsomos') }}">Quem somos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('minhasespecializacoes.index')}}">Minhas especializações</a>
        </li>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                   data-bs-toggle="dropdown" aria-expanded="false"> Consultas Marcadas </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('agendamentos.index') }}">Lista de Consultas</a></li>
                </ul>
            </li>
        </ul>
    </ul>
    <div class="perfil">
        @auth
            <a class="nav-link" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
               aria-expanded="false">
                <img src="{{ asset('/img/avatar.png') }}" alt="Avatar do usuário"
                     class="userImg img-fluid rounded-circle ms-2">
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
    </div>
</aside>

<!-- Conteúdo Principal -->
<main role="main" class="main-content">
    @yield('conteudo')
</main>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
