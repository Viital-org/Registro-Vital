@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de Areas de Atuação')

@section ('conteudo')

    <form action="{{route('atuaareas-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Areas de Atuaçãp</h1>

        <br>

        <label for="area">Area</label>
        <input type="text" name="area" id="area" required>

        <br>

        <label for="especializacao">Especialização</label>
        <input type="text" name="especializacao" id="especializacao" required>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
