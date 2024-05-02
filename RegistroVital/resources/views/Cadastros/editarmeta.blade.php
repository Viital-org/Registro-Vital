@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Metas')

@section ('conteudo')

    <form action="{{ route('metas-update', ['id' => $meta->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('metas-index') }} ">Listar Metas</a>

        <br>

        <a href="{{ route('cadastrometas.create') }} ">Cadastrar Metas</a>

        @method('PUT')

        <h1>Editar Dados de Meta</h1>

        <br>

        <label for="meta">Meta</label>
        <input type="text" name="meta" id="meta" value="{{ $meta->meta }}" required>

        <br>

        <label for="data_inicio">Data de Inicio</label>
        <input type="date" name="data_inicio" id="data_inicio" value="{{ $meta->data_inicio }}" required>

        <br>

        <label for="data_fim">Data de Fim</label>
        <input type="date" name="data_fim" id="data_fim" value="{{ $meta->data_fim }}" required>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" value="{{ $meta->descricao }}" required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
