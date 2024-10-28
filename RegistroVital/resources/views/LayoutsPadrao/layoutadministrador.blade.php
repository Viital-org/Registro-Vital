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
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="marca sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink">
                <img src="{{ asset('/img/cruz.png') }}" alt="Logo" class="logo img-fluid">
                Registro Vital - Admin</i>
        </div>
        <div class="links">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('administrador.dashboard') }}">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quemsomos') }}">Quem somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('relatorios_administrador') }}">Relatórios</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('administrador.logs') }}">Logs</a>
            </li>
        
        </div>
    </a>
</ul>

<!-- Topbar -->
<ul class="topBar navbar-nav ml-auto">
    <li class="nav-item dropdown no-arrow">
        @auth
            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->nome_completo }}
                <img src="{{ asset('/img/cruz.png') }}" alt="Logo" class="userImg img-fluid">
            </a>
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

    <!-- Conteúdo Principal -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
        @yield('conteudo')
    </main>

</body>