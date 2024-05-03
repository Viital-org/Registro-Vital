@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de Dicas')

@section ('conteudo')

    <form action="{{route('dicas-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>

        &nbsp;

        <a href="{{ route('dicas-index') }} " class="btn btn-outline-info">Listar Dicas</a>

        <br>

        <h1>Cadastro de Dicas</h1>

        <br>

        <label for="dica">Dica</label>
        <input type="text" name="dica" id="dica" required>

        <br>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" id="paciente_id" required>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
            @endforeach
        </select>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
