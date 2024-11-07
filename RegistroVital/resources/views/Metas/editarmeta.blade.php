@extends($layout)

@section('titulo', 'Editar Meta')

@section('conteudo')

    <div class="container">
        <h1>Editar Meta</h1>
        <form action="{{ route('metas.update', $meta->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="titulo_meta" class="form-label">Título da Meta</label>
                <input type="text" name="titulo_meta" class="form-control" value="{{ $meta->titulo_meta }}" required>
            </div>

            <div class="mb-3">
                <label for="descricao_meta" class="form-label">Descrição da Meta</label>
                <textarea name="descricao_meta" class="form-control" required>{{ $meta->descricao_meta }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-3">Salvar Alterações</button>
        </form>
    </div>
@endsection
