@extends ('LayoutsPadrao.profissionais')

@section('titulo', 'RegistroVital')

@section('conteudo')

<h1 class="display-3">Bem vindo ao RegistroVital</h1>

<br>
<ul>

<a href="{{ route('pacientes-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Pacientes</a>

<br><br>
<a href="{{ route('profissionais-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Profissionais</a>
<br><br>
<a href="{{ route('atuaareas-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Areas de Atuação</a>
<br><br>
<a href="{{ route('especializacoes-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Especializações</a>
<br><br>
<a href="{{ route('agendamentos-index') }}" class="btn btn-primary btn-lg btn-block">Lista de Agendamentos</a>
<br><br>
<a href="{{ route('tipoanotacao-index') }}" class="btn btn-primary btn-lg btn-block">Lista de tipos de Anotacao</a>
<br><br>
<a href="{{ route('dicas-index')}}" class="btn btn-primary btn-lg btn-block">Lista de Dicas</a>
<br><br>
<a href="{{ route('anotacoessaude-index')}}" class="btn btn-primary btn-lg btn-block">Lista de Anotacoes</a>
<br><br>
<a href="{{ route('metas-index')}}" class="btn btn-primary btn-lg btn-block">Lista de Metas</a>
@endsection

