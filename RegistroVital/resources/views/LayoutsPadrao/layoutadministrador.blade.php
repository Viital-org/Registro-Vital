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

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('/img/cruz.png') }}" alt="Logo" class="img-fluid"
                 style="max-width: 30px; margin-right: 10px;">
            Registro Vital - Admin
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <a class="nav-link" href="{{ route('administrador.profissionais') }}">Profissionais</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('relatorios_administrador') }}">Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('administrador.logs') }}">Logs</a>
                </li>
            </ul>
            <ul class="navbar-nav">
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
        </div>
    </div>
</nav>
<!-- Conteúdo Principal -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
            @yield('conteudo')
        </main>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
