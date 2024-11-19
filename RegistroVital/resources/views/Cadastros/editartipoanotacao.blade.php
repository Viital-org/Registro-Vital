@extends($layout)

@section('titulo', 'Editar Informações de Área de Atuação')

@section('conteudo')

    <form action="{{ route('tipoanotacao-update', ['id' => $Tipoanotacao->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar Dados do Tipo de Anotação</h1>


        <div class="mb-3">
            <label for="desc_anotacao" class="form-label">Descrição da Anotação</label>
            <input type="text" name="descricao_tipo" id="descricao_tipo" class="form-control"
                   value="{{ $Tipoanotacao->descricao_tipo }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

@endsection
