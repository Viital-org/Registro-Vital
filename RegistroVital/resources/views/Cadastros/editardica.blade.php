@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Dicas')

@section ('conteudo')

    <form action="{{ route('dicas-update', ['id' => $dicas->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('dicas-index') }} ">Listar Dicas</a>

        <br>

        <a href="{{ route('cadastrodicas.create') }} ">Cadastrar Dica</a>

        @method('PUT')

        <h1>Editar Dados de Dicas</h1>

        <br>

        <label for="dica">Dica</label>
        <input type="text" name="dica" id="dica" value="{{ $dicas->dica }}" required>

        <br>

        <label for="paciente_id">Especialização:</label>
        <select name="paciente_id" id="paciente_id">
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}"
                        @if ($paciente->id === $dicas->paciente_id) selected @endif>{{ $paciente->nome }}</option>
            @endforeach
        </select>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="{{ $dicas->descricao }}" required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
