<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

    <!-- Importação de arquivos JavaScript e CSS com Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light navbar-custom fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('/img/cruz.png') }}" alt="Logo" class="img-fluid" style="max-width: 30px; margin-right: 10px;">
            Registro Vital - Admin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.dashboard') }}">Painel Principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios.index') }}">Gerenciar Usuários</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorios.index') }}">Relatórios</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}</a>
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
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div class="container-fluid mt-5">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('usuarios.index') }}">Usuários</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dicas.index') }}">Dicas de Saúde</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('metas.index') }}">Metas de Saúde</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agendamentos.index') }}">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('relatorios.index') }}">Relatórios</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            @yield('conteudo')
        </main>
    </div>
</div>

</body>
</html>
