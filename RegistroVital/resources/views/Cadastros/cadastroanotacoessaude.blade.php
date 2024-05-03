@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastrar nova anotacao')

@section ('conteudo')

    <form action="{{route('anotacoessaude-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>

        &nbsp;

        <a href="{{ route('anotacoessaude-index') }} " class="btn btn-outline-info">Listar anotacoes</a>

        <h1>Cadastro de nova anotacao</h1>

        <br>

        <label for="paciente_id">Id do paciente</label>
        <select name="paciente_id" id="paciente_id">
            @foreach ($paciente as $item)
                <option value="{{$item->id}}">{{$item->nome}}</option>
            @endforeach
        </select>

        <br>

        <label for="tipo_anot">Tipo da anotacao</label>
        <select name="tipo_anot" id="tipo_anot">
            @foreach ($tipoanotacao as $item)
                <option value="{{$item->id}}">{{$item->desc_anotacao}}</option>
            @endforeach
        </select>

        <br>

        <label for="anotacao">Anotacao</label>
        <textarea name="anotacao" id="anotacao" required> </textarea>

        <br>

        <label for="data_anotacao">Data da anotacao</label>
        <input type="date" name="data_anotacao" id="data_anotacao" required>

        <br>

        <label for="visibilidade">Visibilidade</label>
        <select name="visibilidade" id="visibilidade">
            <option value="Visivel">Publico</option>
            <option value="Escondido">Privado</option>
        </select>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
