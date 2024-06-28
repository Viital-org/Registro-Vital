@extends($layout)

@section('titulo', 'Cadastro de Áreas de Atuação')

@section('conteudo')

    <form action="{{ route('atuaareas-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Áreas de Atuação</h1>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="text" name="area" id="area" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection
