<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da página dinâmico -->
    <title>@yield('titulo')</title>

    <!-- Importação de arquivos JavaScript e CSS com Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('resources/sass/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #4a6572;">
    <img src="{{ asset('/img/cruz.png') }}" alt="Logo" style="max-width: 3%; margin-left: 1%;" />
    <a class="navbar-brand" href="/" style="font-size: 20px; color: white;">Registro Vital</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('medico.dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('quemsomos') }}">Quem somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ajuda') }}">Ajuda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    Consultas Marcadas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('consultas.index') }}">Lista de Consultas</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                     Auth::user()->name
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('profile.edit') }}">Editar Perfil</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Sair</button>
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Layout Principal com Sidebar -->
<div class="container-fluid mt-5 pt-4">
    <div class="row">
        <!-- Sidebar -->
        <div class="col-md-3 sidebar bg-light py-4">
            <ul class="nav flex-column">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Cadastros</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/cadastroarea">Áreas de Atuação</a></li>
                        <li><a class="dropdown-item" href="/cadastroespec">Especializações</a></li>
                        <li><a class="dropdown-item" href="/cadastrotipanot">Tipos de Anotação</a></li>
                        <li><a class="dropdown-item" href="/cadastrodica">Dicas</a></li>
                        <li><a class="dropdown-item" href="/cadastrometa">Metas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Listagens</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('atuaareas-index') }}">Áreas de Atuação</a></li>
                        <li><a class="dropdown-item" href="{{ route('especializacoes-index') }}">Especializações</a></li>
                        <li><a class="dropdown-item" href="{{ route('agendamentos-index') }}">Agendamentos</a></li>
                        <li><a class="dropdown-item" href="{{ route('tipoanotacao-index') }}">Tipos de Anotação</a></li>
                        <li><a class="dropdown-item" href="{{ route('dicas-index') }}">Dicas</a></li>
                        <li><a class="dropdown-item" href="{{ route('metas-index') }}">Metas</a></li>
                    </ul>
                </li>
            </ul>
        </div>

        <!-- Conteúdo principal -->
        <div class="col-md-9 pt-3 main-content">
            @yield('conteudo')
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
