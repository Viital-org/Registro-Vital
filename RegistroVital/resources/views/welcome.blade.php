@extends ($layout)

@section('titulo', 'RegistroVital')

@section('conteudo')

<<<<<<< HEAD
    <br>
    <div class="container">
        @if (session('error'))
            <div id="error-message" class="alert alert-danger">
                {{ session('error') }}
=======
    <div class="container-fluid">
        <div class="main">
            <h1 class="text-center mb-4">Bem-vindo ao Registro Vital</h1>

            @if (session('error'))
                <div id="error-message" class="alert alert-danger text-center">
                    {{ session('error') }}
                </div>
            @endif

            @if (Route::has('login'))
                <nav>
                    @auth
                        @php
                            switch (Auth::user()->tipo_usuario) {
                                case 1:
                                    $dashboardUrl = url('/paciente/dashboard');
                                    break;
                                case 2:
                                    $dashboardUrl = url('/profissional/dashboard');
                                    break;
                                case 3:
                                    $dashboardUrl = url('/administrador/dashboard');
                                    break;
                                default:
                                    $dashboardUrl = url('/');
                                    break;
                            }
                        @endphp
                        <a href="{{ $dashboardUrl }}" class="btn btn-success mx-2">Ir para o Painel</a>
                    @else
                        <button onclick="window.location.href='{{ route('login') }}'" 
                                class="btn-login">
                            Login
                        </button>

                        @if (Route::has('register'))
                            <button onclick="window.location.href='{{ route('register') }}'"
                                    class="btn-registro">
                                Registro
                            </button>
                        @endif
                    @endauth
                </nav>
            @endif

            <div class="text-center mt-5">
                <p class="lead">Gerencie suas consultas e anotações de saúde de forma simples e eficaz.</p>
                <p class="text-muted">Faça login ou registre-se para começar a usar o RegistroVital!</p>
>>>>>>> develop
            </div>
        @endif
        @if (Route::has('login'))
            <nav class="mb-3 d-flex justify-content-around">
                @auth
                    @php
                        $dashboardUrl = Auth::user()->role === 'medico' ? url('/medico/dashboard') : url('/paciente/dashboard');
                    @endphp
                @else
                    <button onclick="window.location.href='{{ route('login') }}'" class="btn btn-primary mb-3">Login
                    </button>

                    @if (Route::has('register'))
                        <button onclick="window.location.href='{{ route('register') }}'" class="btn btn-primary mb-3">
                            Registro
                        </button>
                    @endif
                @endauth
            </nav>
        @endif
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
@endsection
