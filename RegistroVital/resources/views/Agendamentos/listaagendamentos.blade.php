@extends($layout)

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
                <th>Endereço</th>
            </tr>
            </thead>
            <tbody>
            @foreach($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->id }}</td>
                    <td>{{ $agendamento->especializacao->descricao_especializacao ? $agendamento->especializacao->descricao_especializacao : 'Especialização não encontrada' }}</td>
                    @if(\Illuminate\Support\Facades\Auth::user()->tipo_usuario === 1)
                        <td>{{ $agendamento->profissional->usuario->nome_completo }}</td>
                    @elseif(\Illuminate\Support\Facades\Auth::user()->tipo_usuario === 2)
                        <td>{{ $agendamento->paciente->usuario->nome_completo }}</td>
                    @endif
                    <td>{{ $agendamento->data_agendamento }}</td>
                    <td>{{ $agendamento->valor_atendimento }}</td>
                    <td>{{ $agendamento->endereco->rua . ', ' . $agendamento->endereco->numero_endereco . ' - ' . $agendamento->endereco->bairro . ', ' . $agendamento->endereco->cidade . '/' . $agendamento->endereco->uf }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $agendamentos->links() }}
    </div>
@endsection
