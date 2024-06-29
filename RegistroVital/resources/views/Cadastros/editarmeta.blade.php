@extends($layout)

@section('titulo', 'Editar Informações de Metas')

@section('conteudo')

    <form action="{{ route('metas-update', ['id' => $meta->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar Dados de Meta</h1>

        <div class="mb-3">
            <label for="meta" class="form-label">Meta</label>
            <input type="text" name="meta" id="meta" class="form-control" value="{{ $meta->meta }}" required>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ $meta->data_inicio }}"
                   readonly required>
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label">Data de Fim:</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control" value="{{ $meta->data_fim }}"
                   min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $meta->descricao }}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

@endsection

