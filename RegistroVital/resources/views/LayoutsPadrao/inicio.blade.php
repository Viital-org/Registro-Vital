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
<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #4a6572; color: white;">
    <div class="container">
        <img src="{{ asset('/img/cruz.png') }}" alt="Logo" style="max-width: 3%;"/>
        <a class="navbar-brand" href="/" style="color: white; font-weight: bold; font-size: 20pt;">Registro Vital</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style="color: white;"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    @if (auth()->check())
                        <a class="nav-link"
                           href="{{ auth()->usuario()->tipo_usuario === '1' ? route('paciente.dashboard') : route('profissional.dashboard') }}"
                           style="color: white;">
                            Home
                        </a>
                    @endif
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('quemsomos') }}" style="color: white;">Quem somos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('ajuda') }}" style="color: white;">Ajuda</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Conteúdo da página -->
<div class="container-fluid conteudo-ajuda mt-5 pt-5" style="background-color: #d4e6e5; min-height: 100vh;">
    @yield('conteudo')
</div>

<!-- Scripts -->


<script src="{{asset("js/BuscaCep.js")}}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
