@extends($layout)

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
                    <option value="{{ $tipoanotacao->id}}"
                            @if ($tipoanotacao->id == $anotacaosaude->tipo_anotacao) selected @endif>
                        {{ $tipoanotacao->descricao_tipo }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="anotacao" class="form-label">Anotação</label>
            <textarea name="anotacao" id="anotacao" class="form-control"
                      required>{{ $anotacaosaude->descricao_anotacao }}</textarea>
        </div>

        <div class="mb-3">
            <label for="data_anotacao" class="form-label">Data da anotação</label>
            <input type="date" name="data_anotacao" id="data_anotacao" class="form-control"
                   value="{{ $anotacaosaude->data_anotacao }}" max="{{ date('Y-m-d') }}" required>
        </div>


        <div class="mb-3">
            <label for="visibilidade" class="form-label">Visibilidade</label>
            <select name="visibilidade" id="visibilidade" class="form-select">
                <option value="1" @if ($anotacaosaude->visibilidade === 1) selected @endif>Público</option>
                <option value="2" @if ($anotacaosaude->visibilidade === 2) selected @endif>Privado
                </option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar alterações</button>

    </form>

@endsection


