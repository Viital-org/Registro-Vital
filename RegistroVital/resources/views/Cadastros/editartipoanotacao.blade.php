@extends('LayoutsPadrao.inicio')

@section('titulo', 'Editar Informações de Área de Atuação')

@section('conteudo')

    <form action="{{ route('tipoanotacao-update', ['id' => $Tipoanotacao->id]) }}" method="POST">
        @csrf
        @method('PUT')

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
