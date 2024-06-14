@extends('LayoutsPadrao.inicio')

@section('titulo', 'Cadastro de Consultas')

@section('conteudo')

    <form action="{{ route('consultas-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Consulta</h1>

        <div class="mb-3">
            <label for="data" class="form-label">Data da Consulta</label>
            <input type="date" name="data" id="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status:</label>
            <select name="status" id="status" class="form-select" required>
                <option value="agendado">Agendado</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="profissional_id" class="form-label">Profissional:</label>
            <select name="profissional_id" id="profissional_id" class="form-select" required>
                @foreach($profissionais as $profissional)
                    <option value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
                @endforeach
            </select>
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
            <label for="valor" class="form-label">Valor</label>
            <input type="number" step="0.01" name="valor" id="valor" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection

