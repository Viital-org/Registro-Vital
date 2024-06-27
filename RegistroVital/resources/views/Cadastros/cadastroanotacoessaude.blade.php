@extends('LayoutsPadrao.inicio')

@section('titulo', 'Cadastrar nova anotação')

@section('conteudo')

    <form action="{{ route('anotacoessaude-store') }}" method="POST">
        @csrf

        <h1>Cadastro de nova anotação</h1>

        <div class="mb-3">
            <label for="tipo_anot" class="form-label">Tipo de anotação</label>
            <select name="tipo_anot" id="tipo_anot" class="form-select">
                @foreach ($tipoanotacoes as $tipoanotacao)
                    <option value="{{ $tipoanotacao->id }}">{{ $tipoanotacao->desc_anotacao }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="anotacao" class="form-label">Anotação</label>
            <textarea name="anotacao" id="anotacao" class="form-control" required></textarea>
        </div>

        <div class="mb-3">
            <label for="data_anotacao" class="form-label">Data da anotação</label>
            <input type="date" name="data_anotacao" id="data_anotacao" class="form-control" value="{{ $anotacaosaude->data_anotacao }}" max="{{ date('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label for="visibilidade" class="form-label">Visibilidade</label>
            <select name="visibilidade" id="visibilidade" class="form-select">
                <option value="Visivel">Público</option>
                <option value="Escondido">Privado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection


