<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Título da página dinâmico -->
    <title> @yield('titulo')</title>

    <!-- Importação de arquivos JavaScript e CSS com Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="{{ asset('resources/sass/app.css') }}" rel="stylesheet">

</head>
<body>
<!-- Conteúdo da página -->
<div class="container-fluid">

    <!-- Conteúdo principal com sidebar -->
    <div class="row">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Registro Vital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('medico.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ajuda</a>
                    </li>
                </ul>
            </div>
            <div class="dropdown">
                    <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <label>{{ Auth::user()->name }}</label>
                    </button>
                        <ul class="dropdown-menu">

                            <li>
                            <form method="GET" action="{{ route('profissionais-edit') }}" id="profissionais-edit">
                                @csrf
                                <button type="submit"
                                        onclick="event.preventDefault(); document.getElementById('profissionais-edit').submit();"
                                        class="dropdown-item">Cadastro de Profissional
                                </button>
                            </form>
                            </li>

                            <li>
                            <form method="GET" action="{{ route('profile.edit') }}" id="edit-form">
                                @csrf
                                <button type="submit" onclick="event.preventDefault(); document.getElementById('edit-form').submit();"
                                        class="dropdown-item">Editar Perfil
                                </button>
                            </form>
                            </li>

                            <li>
                            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                @csrf
                                <button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                        class="dropdown-item">Sair
                                </button>
                            </form>
                            </li>

                            
                        </ul>
                </div>
            </div>
        </nav>

        <!-- Sidebar -->
        <div class="bg-light sidebar ml-3">
            <ul class="nav flex-column">
                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listagens
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('consultas-index') }}">Consultas</a></li>
                        <li><a class="dropdown-item" href="{{ route('anotacoessaude-index')}}">Anotações</a></li>
                        <li><a class="dropdown-item" href="{{ route('metas-index')}}">Metas</a></li>
                        <li><a class="dropdown-item" href="{{ route('agendamentos-paciente-index')}}">Agendamentos de
                                @nomeUser</a></li>
                    </ul>
                </div>
            </ul>
        </div>

        <!-- Conteúdo principal -->

    </div>
    <div class="col-md-9 col-lg-9 pt-3 main-content">
        @yield('conteudo')
    </div>
</div>

</body>
</html>
