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

<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <img src="{{ asset('/img/cruz.png') }}" alt="Logo" style="max-width: 3%;"/>
            <a class="navbar-brand" href="/" style="color: white;">Registro Vital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        @if (auth()->check())
                            <a class="nav-link"
                            href="{{ auth()->usuario()->tipo_usuario === '1' ? route('paciente.dashboard') : route('profissional.dashboard') }}">
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
</header>



<!-- Conteúdo da página -->
<div class="container-fluid conteudo-ajuda mt-5 pt-5" style="min-height: 100vh;">
    @yield('conteudo')
</div>

<!-- Formulário de Login
<div class="card shadow-sm p-4">
    <h1 class="">Login</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Campo de E-mail -->
        <!-- <div class="mb-3"> -->
            <!-- <label for="email" class="form-label">Endereço de E-Mail</label>
            <input
                type="email"
                name="email"
                id="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required
                autocomplete="email"
                autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div>

        <!-- Campo de Senha -->
        <!-- <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input
                type="password"
                name="password"
                id="password"
                class="form-control @error('password') is-invalid @enderror"
                required -->
                <!-- autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
            @enderror
        </div> -->

        <!-- Opção de "Lembre-se de mim" -->
        <!-- <div class="form-check mb-3">
            <input -->
                <!-- type="checkbox"
                name="remember"
                class="form-check-input"
                id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Lembre-se de mim</label>
        </div> --> 

        <!-- Botões -->
        <!-- <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link text-center" href="{{ route('password.request') }}">Esqueci minha
                    senha</a>
            @endif
        </div>
    </form>
</div>  -->


<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
