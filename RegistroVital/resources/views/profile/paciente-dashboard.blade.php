@extends ('LayoutsPadrao.inicio')

@section('titulo', 'RegistroVital')

@section('conteudo')
    <div class="container">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    <div class="container">
        <h1>Patient Dashboard</h1>
        <p>Welcome, {{ Auth::user()->name }}. This is your dashboard.</p>
    </div>
@endsection

