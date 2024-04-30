@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de Areas de Atuação')

@section ('conteudo')

    <form action="{{route('atuaareas-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('atuaareas-index') }} ">Listar areas de atuacao</a>

        <br>

        <h1>Cadastro de Areas de Atuação</h1>

        <br>

        <label for="area">Area</label>
        <input type="text" name="area" id="area" required>

        <br>

        <label for="especializacao_id">Especialização:</label>
        <select name="especializacao_id" id="especializacao_id" required>
            @foreach($especializacoes as $especializacao)
                <option value="{{ $especializacao->id }}">{{ $especializacao->especializacao }}</option>
            @endforeach
        </select>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
