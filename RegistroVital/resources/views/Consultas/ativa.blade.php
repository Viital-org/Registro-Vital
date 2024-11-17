@extends($layout)

@section('titulo', 'Consulta Ativa')

@section('conteudo')
    <div class="container my-4">
        <!-- Cabeçalho -->
        <div class="text-center mb-4">
            <h1 class="display-5 text-primary">Consulta Ativa</h1>
            <p class="text-muted">Detalhes e ações disponíveis para esta consulta.</p>
        </div>

        <div class="row g-4">
            <!-- Informações do Paciente -->
            <div class="col-md-12 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h5><i class="bi bi-person-circle me-2"></i>Informações do Paciente</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Nome:</strong> {{ $consulta->paciente->usuario->nome_completo }}</li>
                            <li class="list-group-item"><strong>CPF:</strong> {{ $consulta->paciente->cpf ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Data de Nascimento:</strong> {{ $consulta->paciente->data_nascimento ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Gênero:</strong> {{ $consulta->paciente->genero ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Estado Civil:</strong> {{ $consulta->paciente->estado_civil ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Tipo Sanguíneo:</strong> {{ $consulta->paciente->tipo_sanguineo ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Detalhes da Consulta -->
            <div class="col-md-12 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-secondary text-white">
                        <h5><i class="bi bi-calendar-event me-2"></i>Detalhes da Consulta</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Data Agendada:</strong> {{ $consulta->agendamento->data_agendamento }}</li>
                            <li class="list-group-item"><strong>Horário:</strong> {{ $consulta->agendamento->hora_agendamento }}</li>
                            <li class="list-group-item"><strong>Área Médica:</strong> {{ $consulta->agendamento->especializacao->area->descricao_area ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Especialização:</strong> {{ $consulta->agendamento->especializacao->descricao_especializacao ?? 'N/A' }}</li>
                            <li class="list-group-item"><strong>Profissional:</strong> {{ $consulta->profissional->usuario->nome_completo }}</li>
                            <li class="list-group-item"><strong>Endereço:</strong>
                                {{ $consulta->agendamento->endereco->rua ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->numero_endereco ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->cidade ?? 'N/A' }} -
                                {{ $consulta->agendamento->endereco->uf ?? 'N/A' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prescrição Médica -->
        <div class="card my-4 shadow-sm">
            <div class="card-header bg-info text-white">
                <h5><i class="bi bi-file-earmark-medical me-2"></i>Prescrição Médica</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST" id="prescricaoForm">
                    @csrf
                    <div class="mb-3">
                        <label for="prescricao" class="form-label">Descrição da Prescrição:</label>
                        <textarea id="prescricao" name="prescricao" class="form-control" rows="4">{{ old('prescricao') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="guardarPrescricao(event)">
                        <i class="bi bi-save me-1"></i>Salvar Prescrição
                    </button>
                </form>
            </div>
        </div>

        <!-- Ações -->
        <div class="d-flex justify-content-center gap-3 mt-4">
            @if(Auth::user()->tipo_usuario === 2)
                <a href="{{ route('consultas.anotacoes', $consulta->id) }}" class="btn btn-primary">
                    <i class="bi bi-journal-text me-1"></i>Ver Anotações
                </a>
            @endif
            <button onclick="imprimirPrescricao()" class="btn btn-warning">
                <i class="bi bi-printer me-1"></i>Imprimir Prescrição
            </button>
            <form method="POST" action="{{ route('consultas.finalizar', $consulta->id) }}" onsubmit="return confirm('Deseja finalizar esta consulta?')">
                @csrf
                @method('PATCH')
                <button type="submit" class="btn btn-success">
                    <i class="bi bi-check-circle me-1"></i>Finalizar Consulta
                </button>
            </form>
        </div>
    </div>

    <!-- Layout de Impressão -->
    <div id="prescricaoPrint" style="display:none;">
        <div style="padding: 20px;">
            <h3>Prescrição Médica</h3>
            <p><strong>Paciente:</strong> {{ $consulta->paciente->usuario->nome_completo }}</p>
            <p><strong>Especialização:</strong> {{ $consulta->agendamento->especializacao->descricao_especializacao ?? 'N/A' }}</p>
            <p><strong>Prescrição:</strong></p>
            <p id="prescricaoTexto">{{ old('prescricao', 'Aguardando preenchimento...') }}</p>
        </div>
    </div>

    <script>
        // Salva a prescrição no campo global antes de imprimir
        function guardarPrescricao(event) {
            event.preventDefault(); // Impede o envio do formulário
            const prescricao = document.getElementById('prescricao').value;
            document.getElementById('prescricaoTexto').innerText = prescricao;
        }

        // Função para imprimir o layout
        function imprimirPrescricao() {
            const conteudo = document.getElementById('prescricaoPrint').innerHTML;
            const janelaImpressao = window.open('', '', 'height=500,width=800');
            janelaImpressao.document.write('<html><head><title>Prescrição Médica</title></head><body>');
            janelaImpressao.document.write(conteudo);
            janelaImpressao.document.write('</body></html>');
            janelaImpressao.document.close();
            janelaImpressao.print();
        }
    </script>
@endsection
