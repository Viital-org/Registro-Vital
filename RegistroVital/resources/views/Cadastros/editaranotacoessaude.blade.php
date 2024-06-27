@extends('LayoutsPadrao.inicio')

@section('titulo', 'Editar anotação de saúde')

@section('conteudo')

    <form action="{{ route('anotacoessaude-update', ['id' => $anotacaosaude->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar anotação de saúde</h1>

        <div class="mb-3">
            <label for="tipo_anot" class="form-label">Tipo de anotação</label>
            <select name="tipo_anot" id="tipo_anot" class="form-select">
                @foreach ($tipoanotacoes as $tipoanotacao)
                    <option value="{{ $tipoanotacao->id }}" @if ($tipoanotacao->id == $anotacaosaude->tipo_anot) selected @endif>
                        {{ $tipoanotacao->desc_anotacao }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="anotacao" class="form-label">Anotação</label>
            <textarea name="anotacao" id="anotacao" class="form-control" required>{{ $anotacaosaude->anotacao }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_anotacao" class="form-label">Data da anotação</label>
            <input type="date" name="data_anotacao" id="data_anotacao" class="form-control" value="{{ $anotacaosaude->data_anotacao }}" required>
        </div>

        <div class="mb-3">
            <label for="visibilidade" class="form-label">Visibilidade</label>
            <select name="visibilidade" id="visibilidade" class="form-select">
                <option value="Visivel" @if ($anotacaosaude->visibilidade == 'Visivel') selected @endif>Público</option>
                <option value="Escondido" @if ($anotacaosaude->visibilidade == 'Escondido') selected @endif>Privado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>

    </form>

@endsection


