@extends ('LayoutsPadrao.inicio')

@section('titulo', 'RegistroVital')

@section('conteudo')
    @if (Route::has('login'))
    <nav class="mb-3">
        @auth
            @php
                $dashboardUrl = Auth::user()->role === 'medico' ? url('/medico/dashboard') : url('/paciente/dashboard');
            @endphp
            <button onclick="window.location.href='{{ $dashboardUrl }}'" class="btn btn-primary mb-3">Seu Menu</button>
        @else
            <button onclick="window.location.href='{{ route('login') }}'" class="btn btn-primary mb-3">Login</button>

            @if (Route::has('register'))
                <button onclick="window.location.href='{{ route('register') }}'" class="btn btn-primary mb-3">Registro</button>
            @endif
        @endauth
    </nav>
    @endif
@endsection
