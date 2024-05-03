@extends ('LayoutsPadrao.profissionais')

@section('titulo', 'RegistroVital')

@section('conteudo')

    <h1 class="display-3">Bem-vindo ao RegistroVital</h1>

    <br>
    <ul>
        <a href="{{ route('pacientes-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Pacientes</a>
        <br><br>
        <a href="{{ route('profissionais-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Profissionais</a>
        <br><br>
        <a href="{{ route('consultas-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Consultas</a>
        <br><br>
        <a href="{{ route('atuaareas-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Áreas de Atuação</a>
        <br><br>
        <a href="{{ route('especializacoes-index') }}" class="btn btn-primary btn-lg btn-block">Lista de
            Especializações</a>
        <br><br>
        <a href="{{ route('agendamentos-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Agendamentos</a>
        <br><br>
        <a href="{{ route('tipoanotacao-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Tipos de
            Anotação</a>
        <br><br>
        <a href="{{ route('dicas-index')}}" class="btn btn-primary btn-lg btn-block">Lista de Dicas</a>
        <br><br>
        <a href="{{ route('anotacoessaude-index')}}" class="btn btn-primary btn-lg btn-block">Lista de Anotações</a>
        <br><br>
        <a href="{{ route('metas-index')}}" class="btn btn-primary btn-lg btn-block">Lista de Metas</a>
    </ul>

@endsection


