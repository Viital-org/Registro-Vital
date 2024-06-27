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

        </div>
@endsection
