@extends($layout)

@section('titulo', 'Editar Informações de Especialização')

@section('conteudo')

    <form action="{{ route('especializacoes-update', ['id' => $especializacoes->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar Dados da Especialização</h1>

        <div class="mb-3">
            <label for="especializacao" class="form-label">Especialização</label>
            <input type="text" name="especializacao" id="especializacao" class="form-control"
                   value="{{ $especializacoes->especializacao }}" required>
        </div>

        <div class="mb-3">
            <label for="tempoespecializacao" class="form-label">Tempo da Especialização</label>
            <input type="number" name="tempoespecializacao" id="tempoespecializacao" class="form-control"
                   value="{{ $especializacoes->tempoespecializacao }}" required>
        </div>

        <div class="mb-3">
            <label for="area_id" class="form-label">Área de Atuação:</label>
            <select name="area_id" id="area_id" class="form-select">
                @foreach($atuaareas as $atuaarea)
                    <option value="{{ $atuaarea->id }}"
                            @if ($atuaarea->id === $especializacoes->area_id) selected @endif>{{ $atuaarea->area }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control"
                   value="{{ $especializacoes->descricao }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>

    </form>

@endsection
