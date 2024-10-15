@extends('LayoutsPadrao.layoutpaciente')

@section('titulo', 'Registro Vital - Paciente')

@section('conteudo')
    <div class="container my-5">
        <!-- Exibir mensagem de erro se existir -->
        @if (session('error'))
            <div id="error-message" class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Carousel de Imagens -->
        <div id="carouselExampleSlidesOnly" class="carousel slide shadow-sm rounded" data-bs-ride="carousel" data-bs-interval="3500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/img1.png') }}" class="d-block w-100 rounded" style="max-height: 530px; opacity: 0.75;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/img2.png') }}" class="d-block w-100 rounded" style="max-height: 530px; opacity: 0.75;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/img3.png') }}" class="d-block w-100 rounded" style="max-height: 530px; opacity: 0.75;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/img4.png') }}" class="d-block w-100 rounded" style="max-height: 530px; opacity: 0.75;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(function () {
                    errorMessage.style.display = 'none';
                }, 3000);
            }
        });
    </script>

    <!-- Importando scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection

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
                <a class="nav-link text-white" href="{{ route('paciente.dashboard') }}">Home</a>
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
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Agendamentos</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('agendamentos.create') }}">Agendar Consulta</a></li>
                        <li><a class="dropdown-item" href="{{ route('agendamentos.index') }}">Histórico de Agendamentos</a></li>
                        <li><a class="dropdown-item" href="{{ route('consultas.index') }}">Lista de Consultas</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">Anotações</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('anotacoessaude-create') }}">Cadastrar Anotação</a></li>
                        <li><a class="dropdown-item" href="{{ route('anotacoessaude-index') }}">Listar Anotações</a></li>
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
