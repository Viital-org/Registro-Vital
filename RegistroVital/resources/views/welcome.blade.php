@extends ($layout)

@section('titulo', 'RegistroVital')

@section('conteudo')

    <br>
    <div class="container">
        @if (session('error'))
            <div id="error-message" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    @if (Route::has('login'))
    <nav class="mb-3 d-flex justify-content-around">
        @auth
            @php
                $dashboardUrl = Auth::user()->role === 'medico' ? url('/medico/dashboard') : url('/paciente/dashboard');
            @endphp
        @else
            <button onclick="window.location.href='{{ route('login') }}'" class="btn btn-primary mb-3">Login</button>

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
