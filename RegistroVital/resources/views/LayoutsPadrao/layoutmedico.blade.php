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
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet"> -->
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top mb-4" style="background-color: #4a6572;">
    <img src="{{ asset('/img/cruz.png') }}" alt="Logo" style="max-width: 3%; margin-left: 1%;"/>
    <a class="navbar-brand" href="/" style="font-size: 20px; color: white;">Registro Vital</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('profissional.dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('quemsomos') }}">Quem somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('ajuda') }}">Ajuda</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-expanded="false">
                    Consultas Marcadas
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('consultas.index') }}">Lista de Consultas</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                   data-toggle="dropdown" aria-expanded="false">
                    {{Auth::user()->name}}
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
                <li class="nav-item">
                    <a class="nav-link" href="/cadastroarea">Áreas de Atuação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cadastroespec">Especializações</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cadastrotipanot">Tipos de Anotação</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cadastrodica">Dicas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/cadastrometa">Metas</a>
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
<!-- Substitua a versão do jQuery para a completa, se necessário -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

