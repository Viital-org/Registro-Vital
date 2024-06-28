@extends('layoutspadrao.layoutpaciente')

@section('titulo', 'Meus Agendamentos')

@section('conteudo')
    <div class="container">
        <h1>Meus Agendamentos</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Especialização</th>
                <th>Profissional</th>
                <th>Data do Agendamento</th>
                <th>Valor da Consulta</th>
                <th>Status da Consulta</th>
            </tr>
            </thead>
            <tbody>
            @foreach($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->id }}</td>
                    <td>{{ $agendamento->especializacao->especializacao }}</td>
                    <td>{{ $agendamento->profissional->nome }}</td>
                    <td>{{ $agendamento->data_agendamento }}</td>
                    <td>{{ $agendamento->consulta->valor }}</td>
                    <td>{{ $agendamento->consulta->status }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $agendamentos->links() }}
    </div>
@endsection
