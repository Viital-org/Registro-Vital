@extends ('LayoutsPadrao.inicio')

@section('titulo', 'RegistroVital')

@section('conteudo')

    <br>

    @if (Route::has('login'))
        <nav class="mb-3">
            @auth
                @php
                    $dashboardUrl = Auth::user()->role === 'medico' ? url('/medico/dashboard') : url('/paciente/dashboard');
                @endphp
                <button onclick="window.location.href='{{ $dashboardUrl }}'" class="btn btn-primary mb-3">Seu Menu</button>
            @else
                <a href="{{ route('login') }}" class="mb-3">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="mb-3">Registro</a>
                @endif
            @endauth
        </nav>
    @endif
@endsection
