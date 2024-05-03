@extends('layoutspadrao.profissionais')

@section('titulo', 'Cadastro de Metas')

@section('conteudo')

    <form action="{{ route('metas-store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>
            <a href="{{ route('metas-index') }}" class="btn btn-outline-info">Listar Metas</a>
        </div>

        <h1>Cadastro de Metas</h1>

        <div class="mb-3">
            <label for="meta" class="form-label">Meta</label>
            <input type="text" name="meta" id="meta" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="data_inicio" class="form-label">Data de Início:</label>
            <input type="date" name="data_inicio" id="data_inicio" class="form-control" value="{{ date('Y-m-d') }}"
                   readonly required>
        </div>

        <div class="mb-3">
            <label for="data_fim" class="form-label">Data de Fim:</label>
            <input type="date" name="data_fim" id="data_fim" class="form-control"
                   min="{{ date('Y-m-d', strtotime('+1 day')) }}" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection

