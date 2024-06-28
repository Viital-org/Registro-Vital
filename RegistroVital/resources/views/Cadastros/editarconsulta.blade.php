@extends($layout)

@section('titulo', 'Editar Informações de Consulta')

@section('conteudo')

    <form action="{{ route('consultas-update', ['id' => $consultas->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar Dados de Consulta</h1>

        <div class="mb-3">
            <label for="data" class="form-label">Data da Consulta</label>
            <input type="date" name="data" id="data" class="form-control" value="{{ $consultas->data }}" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="agendado" @if ($consultas->status === 'agendado') selected @endif>Agendado</option>
                <option value="confirmada" @if ($consultas->status === 'confirmada') selected @endif>Confirmada</option>
                <option value="realizada" @if ($consultas->status === 'realizada') selected @endif>Realizada</option>
                <option value="cancelada" @if ($consultas->status === 'cancelada') selected @endif>Cancelada</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="profissional_id" class="form-label">Profissional:</label>
            <select name="profissional_id" id="profissional_id" class="form-select" required>
                @foreach($profissionais as $profissional)
                    <option value="{{ $profissional->id }}"
                            @if ($profissional->id === $consultas->profissional_id) selected @endif>{{ $profissional->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="paciente_id" class="form-label">Paciente:</label>
            <select name="paciente_id" id="paciente_id" class="form-select" required>
                @foreach($pacientes as $paciente)
                    <option value="{{ $paciente->id }}"
                            @if ($paciente->id === $consultas->paciente_id) selected @endif>{{ $paciente->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{$consultas->valor}}"
                   required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>

    </form>

@endsection

