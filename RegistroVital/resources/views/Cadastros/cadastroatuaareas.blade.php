@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de Areas de Atuação')

@section ('conteudo')

    <form action="{{route('atuaareas-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>

        &nbsp;

        <a href="{{ route('atuaareas-index') }} " class="btn btn-outline-info">Listar areas de atuacao</a>

        <br>

        <h1>Cadastro de Areas de Atuação</h1>

        <br>

        <label for="area">Area</label>
        <input type="text" name="area" id="area" required>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
