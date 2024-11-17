@extends($layout)

@section('titulo', 'Detalhes da Consulta')

@section('conteudo')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h3 class="mb-0">Detalhes da Consulta</h3>
            </div>
            <div class="card-body">
                <div class="row">
                    <!-- Detalhes do Agendamento -->
                    <div class="col-md-6 mb-4">
                        <h5 class="text-primary"><i class="fas fa-calendar-alt"></i> Detalhes do Agendamento</h5>
                        <ul class="list-unstyled">
                            <li><strong>Data:</strong> {{ $consulta->agendamento->data_agendamento }}</li>
                            <li><strong>Hora:</strong> {{ $consulta->agendamento->hora_agendamento }}</li>
                            <li>
                                <strong>Status:</strong>
                                @switch($consulta->situacao)
                                    @case(0) <span class="badge bg-warning">Pendente</span> @break
                                    @case(1) <span class="badge bg-success">Confirmada</span> @break
                                    @case(2) <span class="badge bg-info">Finalizada</span> @break
                                    @default <span class="badge bg-danger">Cancelada</span>
                                @endswitch
                            </li>
                            <li><strong>Valor:</strong> {{ 'R$ ' . number_format($consulta->agendamento->valor_atendimento, 2, ',', '.') }}</li>
                        </ul>
                    </div>

                    <!-- Profissional e Paciente -->
                    <div class="col-md-6 mb-4">
                        <h5 class="text-primary"><i class="fas fa-user-md"></i> Profissional</h5>
                        <ul class="list-unstyled">
                            <li><strong>Nome:</strong> {{ $consulta->profissional->usuario->nome_completo }}</li>
                            <li><strong>Especialização:</strong> {{ $consulta->agendamento->especializacao->descricao_especializacao ?? 'N/A' }}</li>
                            <li><strong>Área de Atuação:</strong> {{ $consulta->agendamento->especializacao->area->descricao_area ?? 'N/A' }}</li>
                        </ul>
                        <h5 class="text-primary mt-3"><i class="fas fa-user"></i> Paciente</h5>
                        <ul class="list-unstyled">
                            <li><strong>Nome:</strong> {{ $consulta->paciente->usuario->nome_completo }}</li>
                        </ul>
                    </div>

                    <!-- Local da Consulta -->
                    <div class="col-12 mb-4">
                        <h5 class="text-primary"><i class="fas fa-map-marker-alt"></i> Local da Consulta</h5>
                        <ul class="list-unstyled">
                            <li><strong>Endereço:</strong></li>
                            <li>
                                {{ $consulta->agendamento->endereco->rua ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->cidade ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->uf ?? 'N/A' }} -
                                {{ $consulta->agendamento->endereco->cep ?? 'N/A' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
