@extends($layout)

@section('titulo', 'Cadastro de Dicas')

@section('conteudo')

    <form action="{{ route('dicas-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Dicas</h1>

        <div class="mb-3">
            <label for="dica" class="form-label">Dica</label>
            <input type="text" name="dica" id="dica" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-select" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
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

