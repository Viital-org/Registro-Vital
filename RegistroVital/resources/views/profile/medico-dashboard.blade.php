@extends ('LayoutsPadrao.layoutmedico')

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
            <p>Bem-Vindo, {{ Auth::user()->name }} Esse é o seu menu.</p>

            <form method="GET" action="{{ route('profile.edit') }}" id="edit-form">
                @csrf
                <button type="submit" onclick="event.preventDefault(); document.getElementById('edit-form').submit();"
                        class="btn btn-primary mb-3">Editar Perfil
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" id="logout-form">
                @csrf
                <button type="submit" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                        class="btn btn-primary mb-3">Log Out
                </button>
            </form>
            <form method="GET" action="{{ route('profissionais-edit') }}" id="profissionais-edit">
                @csrf
                <button type="submit"
                        onclick="event.preventDefault(); document.getElementById('profissionais-edit').submit();"
                        class="btn btn-primary mb-3">Completar Cadastro de Profissional
                </button>
            </form>

        </div>
@endsection
