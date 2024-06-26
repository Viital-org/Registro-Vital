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
        <h1>Menu de Medico</h1>
        <p>Bem-Vindo, {{ Auth::user()->name }}.Esse é o seu menu.</p>

        <form method="GET" action="{{ route('profile.edit') }}" id="edit-form">
            @csrf
            <button type="submit" onclick="event.preventDefault(); document.getElementById('edit-form').submit();">Editar Perfil</button>
        </form>

        <form method="POST" action="{{ route('logout') }}" id="logout-form">
            @csrf
            <button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</button>
        </form>
    </div>
@endsection
