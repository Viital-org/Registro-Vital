@extends('LayoutsPadrao.inicio')

@section('titulo', 'Cadastro de Especializações')

@section('conteudo')

    <form action="{{ route('especializacoes-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Especialização</h1>

        <div class="mb-3">
            <label for="especializacao" class="form-label">Especialização</label>
            <input type="text" name="especializacao" id="especializacao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="tempoespecializacao" class="form-label">Tempo da Especialização</label>
            <input type="number" name="tempoespecializacao" id="tempoespecializacao" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="area_id" class="form-label">Área de Atuação:</label>
            <select name="area_id" id="area_id" class="form-select" required>
                @foreach($atuaareas as $atuaarea)
                    <option value="{{ $atuaarea->id }}">{{ $atuaarea->area }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" name="descricao" id="descricao" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection

