@extends($layout)

@section('titulo', 'Detalhes da Consulta')

@section('conteudo')
    <div class="container">
        <h1>Detalhes da Consulta</h1>
        <table class="table">
            <tr>
                <th>Data</th>
                <td>{{ $consulta->agendamento->data_agendamento }}</td>
            </tr>
            <tr>
                <th>Hora</th>
                <td>{{ $consulta->agendamento->hora_agendamento }}</td>
            </tr>
            <tr>
                <th>Status</th>
                <td>
                    @switch($consulta->situacao)
                        @case(0) Pendente @break
                        @case(1) Confirmada @break
                        @case(2) Finalizada @break
                        @default Cancelada
                    @endswitch
                </td>
            </tr>
            <tr>
                <th>Profissional</th>
                <td>{{ $consulta->profissional->usuario->nome_completo }}</td>
            </tr>
            <tr>
                <th>Paciente</th>
                <td>{{ $consulta->paciente->usuario->nome_completo }}</td>
            </tr>
            <tr>
                <th>Especialização</th>
                <td>{{ $consulta->agendamento->especializacao->descricao_especializacao ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Área de Atuação</th>
                <td>{{ $consulta->agendamento->especializacao->area->descricao_area ?? 'N/A' }}</td>
            </tr>
            <tr>
                <th>Endereço</th>
                <td>
                    {{ $consulta->agendamento->endereco->rua ?? 'N/A' }},
                    {{ $consulta->agendamento->endereco->cidade ?? 'N/A' }},
                    {{ $consulta->agendamento->endereco->uf ?? 'N/A' }} -
                    {{ $consulta->agendamento->endereco->cep ?? 'N/A' }}
                </td>
            </tr>
            <tr>
                <th>Valor</th>
                <td>{{ 'R$ ' . number_format($consulta->agendamento->valor_atendimento, 2, ',', '.') }}</td>
            </tr>
        </table>
    </div>
@endsection
