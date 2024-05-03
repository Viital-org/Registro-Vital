@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Área de Atuação')

@section('conteudo')

    <form action="{{ route('tipoanotacao-update', ['id' => $Tipoanotacao->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>
            <a href="{{ route('tipoanotacao-create') }}" class="btn btn-outline-info">Cadastrar Tipo de Anotação</a>
            <a href="{{ route('tipoanotacao-index') }}" class="btn btn-outline-info">Listar Tipos de Anotação</a>
        </div>

        <h1>Editar Dados do Tipo de Anotação</h1>

        <div class="mb-3">
            <label for="tipo_anotacao" class="form-label">Código/Tipo de Anotação</label>
            <input type="number" name="tipo_anotacao" id="tipo_anotacao" class="form-control"
                   value="{{ $Tipoanotacao->tipo_anotacao }}" required>
        </div>

        <div class="mb-3">
            <label for="desc_anotacao" class="form-label">Descrição da Anotação</label>
            <input type="text" name="desc_anotacao" id="desc_anotacao" class="form-control"
                   value="{{ $Tipoanotacao->desc_anotacao }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

@endsection
