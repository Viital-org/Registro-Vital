@extends($layout)

@section('titulo', 'Agendar Consulta')

@section('conteudo')
    <div class="container">
        <h1>Agendar Consulta</h1>
        <form action="{{ route('agendamentos.store') }}" method="POST">
            @csrf
            <!-- Selecione a Área de Atuação -->
            <div class="form-group">
                <label for="area_atuacao_id">Área de Atuação</label>
                <select id="area_atuacao_id" name="area_atuacao_id" class="form-control">
                    <option value="">Selecione a Área de Atuação</option>
                    @foreach ($areasAtuacao as $area)
                        <option value="{{ $area->id }}">{{ $area->descricao_area }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Selecione a Especialização -->
            <div class="form-group">
                <label for="especializacao_id">Especialização</label>
                <select id="especializacao_id" name="especializacao_id" class="form-control">
                    <option value="">Selecione a Especialização</option>
                </select>
            </div>

            <!-- Selecione o Profissional -->
            <div class="form-group">
                <label for="profissional_id">Profissional</label>
                <select id="profissional_id" name="profissional_id" class="form-control">
                    <option value="">Selecione o Profissional</option>
                </select>
            </div>

            <!-- Campo Endereço -->
            <div class="mb-3">
                <label for="endereco_atuacao_id" class="form-label">Endereço</label>
                <select name="endereco_atuacao_id" id="endereco_atuacao_id" class="form-select" required>
                    <option value="">Selecione o endereço da consulta</option>
                </select>
            </div>

            <!-- Campo Data do Agendamento -->
            <div class="mb-3">
                <label for="data_agendamento" class="form-label">Data do Agendamento</label>
                <input type="text" name="data_agendamento" id="data_agendamento" class="form-control"
                       placeholder="Escolher Data" readonly required>
            </div>

            <div class="mb-3">
                <label for="horario_agendamento">Horário</label>
                <select id="horario_agendamento" name="horario_agendamento" class="form-control">
                    <option value="">Escolha o horário</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const areaAtuacaoSelect = document.getElementById('area_atuacao_id');
            const especializacaoSelect = document.getElementById('especializacao_id');
            const profissionalSelect = document.getElementById('profissional_id');
            const enderecoSelect = document.getElementById('endereco_atuacao_id');

            // Evento de mudança na área de atuação
            areaAtuacaoSelect.addEventListener('change', function () {
                fetchEspecializacoes(this.value);
            });

            // Evento de mudança na especialização
            especializacaoSelect.addEventListener('change', function () {
                fetchProfissionais(this.value, areaAtuacaoSelect.value);
            });

            // Evento de mudança no profissional
            profissionalSelect.addEventListener('change', function () {
                fetchEndereco(profissionalSelect.value, areaAtuacaoSelect.value, especializacaoSelect.value);
                setupFlatpickr(profissionalSelect.value, especializacaoSelect.value, areaAtuacaoSelect.value);
            });

            function fetchEspecializacoes(areaAtuacaoId) {
                if (areaAtuacaoId) {
                    fetch(`/agendamentos/especializacoes/${areaAtuacaoId}`)
                        .then(response => response.json())
                        .then(data => {
                            especializacaoSelect.innerHTML = '<option value="">Selecione a Especialização</option>';
                            profissionalSelect.innerHTML = '<option value="">Selecione o Profissional</option>';
                            data.forEach(especializacao => {
                                const option = document.createElement('option');
                                option.value = especializacao.id;
                                option.textContent = especializacao.descricao_especializacao;
                                especializacaoSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Erro ao buscar especializações:', error));
                } else {
                    especializacaoSelect.innerHTML = '<option value="">Selecione a Especialização</option>';
                    profissionalSelect.innerHTML = '<option value="">Selecione o Profissional</option>';
                }
            }

            function fetchProfissionais(especializacaoId, areaAtuacaoId) {
                if (especializacaoId && areaAtuacaoId) {
                    fetch(`/agendamentos/profissionais/${areaAtuacaoId}/${especializacaoId}`)
                        .then(response => response.json())
                        .then(data => {
                            profissionalSelect.innerHTML = '<option value="">Selecione o Profissional</option>';
                            data.forEach(profissional => {
                                const option = document.createElement('option');
                                option.value = profissional.usuario_id;
                                option.textContent = `${profissional.nome_completo}`
                                profissionalSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Erro ao buscar profissionais:', error));
                }
            }
            function fetchEndereco(profissionalId, areaAtuacaoId, especializacaoId) {
                if (profissionalId && areaAtuacaoId && especializacaoId) {
                    fetch(`/agendamentos/endereco/${profissionalId}/${areaAtuacaoId}/${especializacaoId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.endereco_atuacao_id) {
                                enderecoSelect.innerHTML = `<option value="${data.endereco_atuacao_id}">${data.endereco}</option>`;
                            } else {
                                enderecoSelect.innerHTML = '<option value="">Endereço não encontrado</option>';
                            }
                        })
                        .catch(error => console.error('Erro ao buscar o endereço:', error));
                }
            }

            let flatpickrInstance = null; // Variável para armazenar a instância do flatpickr

// Função para configurar o Flatpickr
            function setupFlatpickr(profissionalId, especializacaoId, areaAtuacaoId) {
                // Resetar o campo de data e limpar qualquer data selecionada
                document.getElementById("data_agendamento").value = '';

                // Se uma instância do flatpickr já existe, destrua-a antes de criar uma nova
                if (flatpickrInstance) {
                    flatpickrInstance.destroy();
                }

                // Fazer o fetch dos dias de atendimento e configurar o flatpickr
                fetch(`/dias-atendimento/${profissionalId}/${especializacaoId}/${areaAtuacaoId}`)
                    .then(response => response.json())
                    .then(diasPermitidos => {
                        // Mapeando os dias de semana em português para os valores corretos do Flatpickr (0 - Domingo, 6 - Sábado)
                        const diasSemanaMap = {
                            'sunday': 0,
                            'monday': 1,
                            'tuesday': 2,
                            'wednesday': 3,
                            'thursday': 4,
                            'friday': 5,
                            'saturday': 6
                        };

                        // Convertendo os diasPermitidos de português para os índices corretos do Flatpickr
                        const diasPermitidosIndices = diasPermitidos.map(dia => diasSemanaMap[dia.toLowerCase()]);

                        // Inicializando o flatpickr
                        flatpickrInstance = flatpickr("#data_agendamento", {
                            dateFormat: "Y-m-d",
                            minDate: "today",
                            disable: [
                                function(date) {
                                    // Desabilita os dias da semana que não estão na lista dos diasPermitidosIndices
                                    return !diasPermitidosIndices.includes(date.getDay());
                                }
                            ],
                            locale: {
                                firstDayOfWeek: 1 // Define a segunda-feira como o primeiro dia da semana
                            }
                        });
                    })
                    .catch(error => console.error('Erro ao carregar dias de atendimento:', error));
            }

// Função para adicionar o listener de alteração nos campos de seleção
            function addChangeListeners() {
                const areaAtuacao = document.getElementById('area_atuacao'); // Id do campo de área de atuação
                const especializacao = document.getElementById('especializacao'); // Id do campo de especialização
                const profissional = document.getElementById('profissional'); // Id do campo de profissional

                // Adicionando listeners para os campos de seleção
                areaAtuacao.addEventListener('change', () => resetData());
                especializacao.addEventListener('change', () => resetData());
                profissional.addEventListener('change', () => resetData());
            }

// Função para resetar a data e atualizar o Flatpickr
            function resetData() {
                // Resetar o campo de data e garantir que mostre o placeholder
                document.getElementById("data_agendamento").value = '';

                // Reconfigurar o flatpickr com os valores atuais dos campos de seleção
                const profissionalId = document.getElementById('profissional').value;
                const especializacaoId = document.getElementById('especializacao').value;
                const areaAtuacaoId = document.getElementById('area_atuacao').value;

                setupFlatpickr(profissionalId, especializacaoId, areaAtuacaoId);
            }

// Chamar a função addChangeListeners assim que a página for carregada ou quando o DOM estiver pronto
            document.addEventListener('DOMContentLoaded', () => {
                addChangeListeners();  // Adiciona os listeners para os campos de seleção
            });

            function fetchEspecializacaoProfissionalId(profissionalId, especializacaoId, areaAtuacaoId) {
                return fetch(`/especializacao-profissional/${profissionalId}/${especializacaoId}/${areaAtuacaoId}`)
                    .then(response => response.json())
                    .then(data => data.especializacao_profissional_id)
                    .catch(error => console.error('Erro ao buscar o ID da especialização profissional:', error));
            }

            document.getElementById('data_agendamento').addEventListener('change', async function () {
                const dataSelecionada = new Date(this.value);
                const diasDaSemana = ['segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado', 'domingo'];
                const diaSemana = diasDaSemana[dataSelecionada.getDay()];

                const profissionalId = profissionalSelect.value;
                const especializacaoId = especializacaoSelect.value;
                const areaAtuacaoId = areaAtuacaoSelect.value;

                // Obter especializacao_profissional_id antes de buscar horários
                const especializacaoProfissionalId = await fetchEspecializacaoProfissionalId(profissionalId, especializacaoId, areaAtuacaoId);

                if (especializacaoProfissionalId) {
                    // Cria a URL com todos os parâmetros necessários
                    const url = `/horarios-disponiveis?dia_semana=${diaSemana}&especializacao_profissional_id=${especializacaoProfissionalId}`;

                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            const horarioSelect = document.getElementById('horario_agendamento');
                            horarioSelect.innerHTML = '<option value="">Escolha o horário</option>';

                            // Preenche o select com os horários disponíveis
                            data.forEach(horario => {
                                const option = document.createElement('option');
                                option.value = horario.id;
                                option.textContent = `${horario.inicio_atendimento}`;  // Exibe somente o horário de início
                                horarioSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Erro ao carregar horários:', error));
                }
            });
        });
    </script>
@endsection
