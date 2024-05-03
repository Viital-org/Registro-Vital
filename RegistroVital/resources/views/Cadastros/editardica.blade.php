@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Dicas')

@section('conteudo')

    <form action="{{ route('dicas-update', ['id' => $dicas->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>
            <a href="{{ route('dicas-index') }}" class="btn btn-outline-info">Listar Dicas</a>
            <a href="{{ route('cadastrodicas.create') }}" class="btn btn-outline-info">Cadastrar Dica</a>
        </div>

        <h1>Editar Dados de Dicas</h1>

        <div class="mb-3">
            <label for="dica" class="form-label">Dica</label>
            <input type="text" name="dica" id="dica" class="form-control" value="{{ $dicas->dica }}" required>
        </div>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-select">
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}"
                            @if ($paciente->id === $dicas->paciente_id) selected @endif>{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $dicas->descricao }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>

    </form>

@endsection

