@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Anotação')

@section('conteudo')

    <form action="{{ route('anotacoessaude-update', ['id' => $anotacaosaude->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>
            <a href="{{ route('anotacoessaude-index') }}" class="btn btn-outline-info">Listar Anotações</a>
            <a href="{{ route('cadastroanotacoes.create') }}" class="btn btn-outline-info">Cadastrar Anotação</a>
        </div>

        <h1>Editar Dados da Anotação</h1>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente</label>
            <input type="text" name="paciente_id" id="paciente_id" class="form-control" value="{{ $anotacaosaude->paciente_id }}" readonly>
        </div>

        <div class="mb-3">
            <label for="tipo_anot" class="form-label">Tipo de Anotação</label>
            <select name="tipo_anot" id="tipo_anot" class="form-select" required>
                @foreach($tipoanotacao as $item)
                    <option value="{{ $item->id }}">{{ $item->desc_tipo }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="visibilidade" class="form-label">Visibilidade</label>
            <select name="visibilidade" id="visibilidade" class="form-select">
                <option value="Visivel">Público</option>
                <option value="Escondido">Privado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="data_anotacao" class="form-label">Data da Anotação</label>
            <input type="text" name="data_anotacao" id="data_anotacao" class="form-control" value="{{ $anotacaosaude->data_anotacao }}" readonly>
        </div>

        <div class="mb-3">
            <label for="anotacao" class="form-label">Anotação</label>
            <textarea name="anotacao" id="anotacao" class="form-control">{{ $anotacaosaude->anotacao }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

@endsection

