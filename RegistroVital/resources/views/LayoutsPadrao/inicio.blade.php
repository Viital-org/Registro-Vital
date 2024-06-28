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
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
<!-- Conteúdo da página -->
<div class="container-fluid">

    <!-- Conteúdo principal com sidebar -->
    <div class="row">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <a class="navbar-brand" href="{{ route('welcome') }}">Registro Vital</a>
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
                        <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
                    </li>
                </ul>
            </div>

        </nav>

        <!-- Sidebar -->
        <div class="bg-light sidebar ml-3">
            <ul class="nav flex-column">

            </ul>
        </div>

        <!-- Conteúdo principal -->

    </div>
    <div class="col-md-9 col-lg-9 pt-3 main-content ">
        @yield('conteudo')
    </div>
        
    </div>
</div>


</body>
</html>
