@extends($layout)

@section('titulo', 'Detalhes da Consulta')

@section('conteudo')
    <div class="container">
        <h1>Detalhes da Consulta</h1>
        <table class="table">
            <tr>
                <th>ID</th>
                <td>{{ $consulta->id }}</td>
            </tr>
            <tr>
                <th>Data</th>
                <td>{{ $consulta->data }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>{{ $consulta->status }}</td>
            </tr>
            <tr>
                <th>Profissional</th>
                <td>{{ $consulta->profissional->nome }}</td>
            </tr>
            <tr>
                <th>Paciente</th>
                <td>{{ $consulta->paciente->nome }}</td>
            </tr>
            <tr>
                <th>Valor</th>
                <td>{{ $consulta->valor }}</td>
            </tr>
        </table>
        @if (Auth::user()->role === 'paciente')
            <form action="{{ route('consultas.update', $consulta->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select name="status" id="status" class="form-select" required>
                        <option value="agendado" {{ $consulta->status === 'agendado' ? 'selected' : '' }}>Agendado
                        </option>
                        <option value="confirmada" {{ $consulta->status === 'confirmada' ? 'selected' : '' }}>
                            Confirmada
                        </option>
                        <option value="cancelada" {{ $consulta->status === 'cancelada' ? 'selected' : '' }}>Cancelada
                        </option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Atualizar Status</button>
            </form>
        @endif
        @if(Auth::user()->role === 'medico')
            <a href="{{ route('anotacoessaude-index') }}" class="btn btn-primary">Listar Todas as Anotações</a>
        @endif
    </div>
@endsection
