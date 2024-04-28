@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Consulta')

@section ('conteudo')

    <form action="{{ route('consultas-update', ['id' => $consultas->id]) }}" method="POST">

        @csrf

        @method('PUT')

        <h1>Editar Dados de Consulta</h1>

        <br>

        <label for="data">Data da Consulta</label>
        <input type="date" name="data" id="data" value="{{$consultas->data}}" required>

        <br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="agendado">agendado</option>
            <option value="confirmada">confirmada</option>
            <option value="realizada">realizada</option>
            <option value="cancelada">cancelada</option>
        </select>

        <br>

        <label for="profissional_id">Profissional:</label>
        <select name="profissional_id" id="profissional_id" required>
            @foreach($profissionais as $profissional)
                <option value="{{ $profissional->id }}">{{ $profissional->nome }}</option>
            @endforeach
        </select>

        <br>

        <label for="especialidade">especialidade</label>
        <input type="text" name="especialidade" id="especialidade" value="{{$consultas->especialidade}}" required>

        <br>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" id="paciente_id" required>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
            @endforeach
        </select>

        <br>

        <label for="valor">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" value="{{$consultas->valor}}" required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
