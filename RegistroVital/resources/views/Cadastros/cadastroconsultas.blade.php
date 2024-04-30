@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Cadastro de Consultas')

@section ('conteudo')

    <form action="{{route('consultas-store')}}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>
        
        <a href="{{ route('consultas-index') }} ">Listar Consultas</a>

        <br>

        <h1>Cadastro de Consulta</h1>

        <br>

        <label for="data">Data da Consulta</label>
        <input type="date" name="data" id="data" required>

        <br>

        <label for="status">Status:</label>
        <select name="status" id="status" required>
            <option value="agendado">agendado</option>
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
        <input type="text" name="especialidade" id="especialidade" required>

        <br>

        <label for="paciente_id">Paciente:</label>
        <select name="paciente_id" id="paciente_id" required>
            @foreach($pacientes as $paciente)
                <option value="{{ $paciente->id }}">{{ $paciente->nome }}</option>
            @endforeach
        </select>

        <br>

        <label for="valor">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" required>

        <br>
        <input type="submit" value="Enviar">

    </form>

@endsection
