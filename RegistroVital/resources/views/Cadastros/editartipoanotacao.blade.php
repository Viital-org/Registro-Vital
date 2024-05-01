@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Area de Atuação')

@section ('conteudo')

    <form action="{{ route('tipoanotacao-update', ['id' => $Tipoanotacao->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('tipoanotacao-create') }} ">Cadastrar tipo de anotacao</a>

        @method('PUT')

        <h1>Editar Dados do tipo de anotacao</h1>

        <br>

        <label for="tipo_anotacao">Codigo/Tipo anotacao</label>
        <input type="number" name="tipo_anotacao" id="tipo_anotacao" value="{{ $Tipoanotacao->tipo_anotacao}}" required>

        <br>

        <label for="desc_anotacao">Descricao da anotacao</label>
        <input type="text" name="desc_anotacao" id="desc_anotacao" value="{{ $Tipoanotacao->desc_anotacao}}" required>

        <br>


        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
