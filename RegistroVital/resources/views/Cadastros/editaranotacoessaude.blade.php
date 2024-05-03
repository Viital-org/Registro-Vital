@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar anotacao')

@section ('conteudo')

    <form action="{{ route('anotacoessaude-update', ['id' => $anotacaosaude->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>

        &nbsp;

        <a href="{{ route('anotacoessaude-index') }} " class="btn btn-outline-info">Listar Anotacoes</a>

        <br>

        <a href="{{ route('cadastroanotacoes.create') }} ">Cadastrar anotacao</a>

        @method('PUT')

        <h1>Editar Dados da anotacao</h1>

        <br>

        <label for="paciente_id">Paciente</label>
        <input type="text" name="paciente_id" id="paciente_id" value="{{ $anotacaosaude->paciente_id }}" readonly>

        <br>

        <label for="tipo_anot">Tipo de anotacao:</label>
        <select name="tipo_anot" id="tipo_anot" required>
            @foreach($tipoanotacao as $item)
                <option value="{{ $item->id }}">{{ $item->desc_tipo}}</option>
            @endforeach
        </select>

        <br>

        <label for="visibilidade">Visibilidade</label>
        <select name="visibilidade" id="visibilidade">
            <option value="Visivel">Publico</option>
            <option value="Escondido">Privado</option>
        </select>

        <br>

        <label for="data_anotacao">Data da anotacao</label>
        <input type="text" name="data_anotacao" id="data_anotacao" value="{{ $anotacaosaude->data_anotacao }}" readonly>

        <br>

        <label for="anotacao">Anotacao</label>
        <textarea name="anotacao" id="anotacao">{{ $anotacaosaude->anotacao }}</textarea>

        <br>


        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
