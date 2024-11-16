@extends($layout)

@section('titulo', 'Consulta Ativa')

@section('conteudo')
    <div class="container mt-4">
        <div class="row">
            <!-- Coluna de Informações do Paciente -->
            <div class="col-md-12 col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Informações do Paciente</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Nome:</strong> {{ $consulta->paciente->usuario->nome_completo }}</li>
                            <li><strong>CPF:</strong> {{ $consulta->paciente->cpf ?? 'N/A' }}</li>
                            <li><strong>Data de Nascimento:</strong> {{ $consulta->paciente->data_nascimento ?? 'N/A' }}</li>
                            <li><strong>Gênero:</strong> {{ $consulta->paciente->genero ?? 'N/A' }}</li>
                            <li><strong>Estado Civil:</strong> {{ $consulta->paciente->estado_civil ?? 'N/A' }}</li>
                            <li><strong>Tipo Sanguíneo:</strong> {{ $consulta->paciente->tipo_sanguineo ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Coluna de Detalhes da Consulta -->
            <div class="col-md-12 col-lg-6 mb-3">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        <h5>Detalhes da Consulta</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled">
                            <li><strong>Data Agendada:</strong> {{ $consulta->agendamento->data_agendamento }}</li>
                            <li><strong>Horário Agendado:</strong> {{ $consulta->agendamento->hora_agendamento }}</li>
                            <li><strong>Área Médica:</strong> {{ $consulta->agendamento->especializacao->area->descricao_area ?? 'N/A' }}</li>
                            <li><strong>Especialização:</strong> {{ $consulta->agendamento->especializacao->descricao_especializacao ?? 'N/A' }}</li>
                            <li><strong>Profissional Responsável:</strong> {{ $consulta->profissional->usuario->nome_completo }}</li>
                            <li><strong>Endereço da Consulta:</strong> {{ $consulta->agendamento->endereco->rua ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->numero_endereco ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->cidade ?? 'N/A' }},
                                {{ $consulta->agendamento->endereco->uf ?? 'N/A' }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Formulário de Prescrição -->
        <div class="row">
            <div class="col-12 mb-3">
                <div class="card">
                    <div class="card-header bg-info text-white">
                        <h5>Prescrição Médica</h5>
                    </div>
                    <div class="card-body">
                        <form action="#" method="POST" id="prescricaoForm">
                            @csrf
                            <div class="form-group">
                                <label for="prescricao">Descrição da Prescrição:</label>
                                <textarea id="prescricao" name="prescricao" class="form-control" rows="4">{{ old('prescricao') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" onclick="guardarPrescricao(event)">Salvar Prescrição</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ações -->
        <div class="row">
            <div class="col-12">
                <div class="btn-group" role="group">
                    @if(Auth::user()->tipo_usuario === 2)
                        <a href="{{ route('consultas.anotacoes', $consulta->id) }}" class="btn btn-primary">Ver Anotações do Paciente</a>
                    @endif
                    <button onclick="imprimirPrescricao()" class="btn btn-warning">Imprimir Prescrição</button>
                    <form method="POST" action="{{ route('consultas.finalizar', $consulta->id) }}" onsubmit="return confirm('Deseja finalizar esta consulta?')">
                        @csrf
                        @method('PATCH')
                        <button type="submit" class="btn btn-success">Finalizar Consulta</button>
                    </form>
                </div>
            </div>
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
            // Atualiza o conteúdo da área de impressão com a prescrição
            document.getElementById('prescricaoTexto').innerText = prescricao;
        }

        // Função para imprimir o layout
        function imprimirPrescricao() {
            var conteudo = document.getElementById('prescricaoPrint').innerHTML;
            var janelaImpressao = window.open('', '', 'height=500,width=800');
            janelaImpressao.document.write('<html><head><title>Prescrição Médica</title>');
            janelaImpressao.document.write('<style>@media print { body { font-family: Arial, sans-serif; } }</style>');
            janelaImpressao.document.write('</head><body>');
            janelaImpressao.document.write(conteudo);
            janelaImpressao.document.write('</body></html>');
            janelaImpressao.document.close();
            janelaImpressao.print();
        }
    </script>
@endsection
