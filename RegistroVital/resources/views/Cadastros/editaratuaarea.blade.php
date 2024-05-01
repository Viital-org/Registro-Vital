@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Area de Atuação')

@section ('conteudo')

    <form action="{{ route('atuaareas-update', ['id' => $atuaarea->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('atuaareas-index') }} ">Listar areas de atuacao</a>

        <br>

        <a href="{{ route('cadastroatuaareas.create') }} ">Cadastrar area de atuacao</a>

        @method('PUT')

        <h1>Editar Dados de Area de Atuação</h1>

        <br>

        <label for="area">Area</label>
        <input type="text" name="area" id="area" value="{{ $atuaarea->area }}" required>


        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="{{ $atuaarea->descricao }}" required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
