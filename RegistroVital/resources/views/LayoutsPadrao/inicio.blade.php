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
            <a class="navbar-brand" href="/">Registro Vital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        @if (auth()->check())
                            @if (auth()->user()->role === 'paciente')
                                <a class="nav-link" href="{{ route('paciente.dashboard') }}">Home</a>
                            @elseif (auth()->user()->role === 'medico')
                                <a class="nav-link" href="{{ route('medico.dashboard') }}">Home</a>
                            @endif
                        @endif

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quemsomos') }}">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Ajuda</a>
                    </li>
                </ul>
            </div>

        </nav>

        <!-- Sidebar -->
        <div class="bg-light sidebar ml-3">
            <ul class="nav flex-column">

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Cadastros
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/cadastropaci">Pacientes</a></li>
                        <li><a class="dropdown-item" href="/cadastrarprof">Profissionais</a></li>
                        <li><a class="dropdown-item" href="/cadastroconsul">Consultas</a></li>
                        <li><a class="dropdown-item" href="/cadastroarea">Areas de atuacao</a></li>
                        <li><a class="dropdown-item" href="/cadastroespec">Especializações</a></li>
                        <li><a class="dropdown-item" href="/cadastrotipanot">Tipos de anotação</a></li>
                        <li><a class="dropdown-item" href="/cadastrodica">Dicas</a></li>
                        <li><a class="dropdown-item" href="/cadastroanotacoes">Anotações</a></li>
                        <li><a class="dropdown-item" href="/cadastrometa">Metas</a></li>
                    </ul>
                </div>

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listagens
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('pacientes-index') }}">Pacientes</a></li>
                        <li><a class="dropdown-item" href="{{ route('profissionais-index') }}">Profissionais</a></li>
                        <li><a class="dropdown-item" href="{{ route('consultas-index') }}">Consultas</a></li>
                        <li><a class="dropdown-item" href="{{ route('atuaareas-index') }}">Areas de atuacao</a></li>
                        <li><a class="dropdown-item" href="{{ route('especializacoes-index') }}">Especializações</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('agendamentos-index') }}">Agendamentos</a></li>
                        <li><a class="dropdown-item" href="{{ route('tipoanotacao-index') }}">Tipos de anotação</a></li>
                        <li><a class="dropdown-item" href="{{ route('dicas-index')}}">Dicas</a></li>
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
    <div class="col-md-9 col-lg-9 pt-3 main-content ">
        @yield('conteudo')
    </div>
</div>

</body>
</html>
