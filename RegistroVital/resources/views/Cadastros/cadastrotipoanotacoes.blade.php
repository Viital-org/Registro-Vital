@extends($layout)

@section('titulo', 'Cadastro de Tipos de Anotação')

@section('conteudo')

    <form action="{{ route('tipoanotacao-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Tipos de Anotação</h1>

        <div class="mb-3">
            <label for="cad_tipanot" class="form-label">Tipo/Código da Anotação</label>
            <input type="number" name="cad_tipanot" id="cad_tipanot" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="desc_anotacao" class="form-label">Descrição da Anotação</label>
            <input type="text" name="desc_anotacao" id="desc_anotacao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection
