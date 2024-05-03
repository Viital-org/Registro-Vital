@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Área de Atuação')

@section('conteudo')

    <form action="{{ route('atuaareas-update', ['id' => $atuaarea->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>
            <a href="{{ route('atuaareas-index') }}" class="btn btn-outline-info">Listar Áreas de Atuação</a>
            <a href="{{ route('cadastroatuaareas.create') }}" class="btn btn-outline-info">Cadastrar Área de Atuação</a>
        </div>

        <h1>Editar Dados de Área de Atuação</h1>

        <div class="mb-3">
            <label for="area" class="form-label">Área</label>
            <input type="text" name="area" id="area" class="form-control" value="{{ $atuaarea->area }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $atuaarea->descricao }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>

    </form>

@endsection

