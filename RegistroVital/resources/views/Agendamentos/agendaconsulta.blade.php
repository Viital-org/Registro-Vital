@extends($layout)

@section('titulo', 'Agendar Consulta')

@section('conteudo')
    <div class="container-fluid">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                        class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Agendamento de consultas</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{ route('agendamentos.store') }}" method="POST">
                        @csrf

                        <!-- Selecione a área de atuação -->
                        <div class="form-group">
                            <label for="area_atuacao_id">Área de Atuação</label>
                            <select id="area_atuacao_id" name="area_atuacao_id" class="form-control">
                                <option value="">Selecione a Área de Atuação</option>
                                @foreach ($areasAtuacao as $area)
                                    <option value="{{ $area->id }}">{{ $area->descricao_area }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Selecione a Especialização-->
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

                        <!-- Campo Valor do Atendimento -->
                        <div class="mb-3">
                            <label for="valor_atendimento" class="form-label">Valor do Atendimento</label>
                            <input type="text" name="valor_atendimento" id="valor_atendimento" class="form-control"
                                   readonly>
                        </div>

                        <!-- Agendar -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Agendar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
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
            const valorAtendimentoInput = document.getElementById('valor_atendimento');

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
                fetchValorAtendimento(profissionalSelect.value, areaAtuacaoSelect.value, especializacaoSelect.value, enderecoSelect.value);
            });

            // Evento de mudança no endereço
            enderecoSelect.addEventListener('change', function () {
                fetchValorAtendimento(profissionalSelect.value, areaAtuacaoSelect.value, especializacaoSelect.value, enderecoSelect.value);
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
                                option.textContent = `${profissional.nome_completo}`;
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
                                fetchValorAtendimento(profissionalId, areaAtuacaoId, especializacaoId, data.endereco_atuacao_id);
                            } else {
                                enderecoSelect.innerHTML = '<option value="">Endereço não encontrado</option>';
                            }
                        })
                        .catch(error => console.error('Erro ao buscar o endereço:', error));
                }
            }

            let flatpickrInstance = null; // Variável para armazenar a instância do flatpickr

            function setupFlatpickr(profissionalId, especializacaoId, areaAtuacaoId) {
                document.getElementById("data_agendamento").value = '';

                if (flatpickrInstance) {
                    flatpickrInstance.destroy();
                }

                fetch(`/dias-atendimento/${profissionalId}/${especializacaoId}/${areaAtuacaoId}`)
                    .then(response => response.json())
                    .then(diasPermitidos => {
                        const diasSemanaMap = {
                            'sunday': 0,
                            'monday': 1,
                            'tuesday': 2,
                            'wednesday': 3,
                            'thursday': 4,
                            'friday': 5,
                            'saturday': 6
                        };
                        const diasPermitidosIndices = diasPermitidos.map(dia => diasSemanaMap[dia.toLowerCase()]);

                        flatpickrInstance = flatpickr("#data_agendamento", {
                            dateFormat: "Y-m-d",
                            minDate: "today",
                            disable: [
                                function (date) {
                                    return !diasPermitidosIndices.includes(date.getDay());
                                }
                            ],
                            locale: {firstDayOfWeek: 1}
                        });
                    })
                    .catch(error => console.error('Erro ao carregar dias de atendimento:', error));
            }

            async function fetchEspecializacaoProfissionalId(profissionalId, especializacaoId, areaAtuacaoId) {
                try {
                    const response = await fetch(`/especializacao-profissional/${profissionalId}/${especializacaoId}/${areaAtuacaoId}`);
                    const data = await response.json();
                    return data.especializacao_profissional_id;
                } catch (error) {
                    console.error('Erro ao buscar o ID da especialização profissional:', error);
                    return null;
                }
            }

            document.getElementById('data_agendamento').addEventListener('change', async function () {
                const dataSelecionada = new Date(this.value);
                const diasDaSemana = ['segunda-feira', 'terça-feira', 'quarta-feira', 'quinta-feira', 'sexta-feira', 'sábado', 'domingo'];
                const diaSemana = diasDaSemana[dataSelecionada.getDay()];

                const profissionalId = profissionalSelect.value;
                const especializacaoId = especializacaoSelect.value;
                const areaAtuacaoId = areaAtuacaoSelect.value;

                const especializacaoProfissionalId = await fetchEspecializacaoProfissionalId(profissionalId, especializacaoId, areaAtuacaoId);

                if (especializacaoProfissionalId) {
                    const url = `/horarios-disponiveis?dia_semana=${diaSemana}&especializacao_profissional_id=${especializacaoProfissionalId}`;
                    fetch(url)
                        .then(response => response.json())
                        .then(data => {
                            const horarioSelect = document.getElementById('horario_agendamento');
                            horarioSelect.innerHTML = '<option value="">Escolha o horário</option>';
                            data.forEach(horario => {
                                const option = document.createElement('option');
                                option.value = `${horario.inicio_atendimento}`;
                                option.textContent = `${horario.inicio_atendimento}`;
                                horarioSelect.appendChild(option);
                            });
                        })
                        .catch(error => console.error('Erro ao buscar horários disponíveis:', error));
                } else {
                    console.error('Especialização profissional não encontrada.');
                }
            });

            function fetchValorAtendimento(profissionalId, areaAtuacaoId, especializacaoId, enderecoId) {
                if (profissionalId && areaAtuacaoId && especializacaoId && enderecoId) {
                    fetch(`/valor-atendimento/${profissionalId}/${areaAtuacaoId}/${especializacaoId}/${enderecoId}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.valor_atendimento !== null) {
                                valorAtendimentoInput.value = `R$ ${data.valor_atendimento}`;
                            } else {
                                valorAtendimentoInput.value = 'Valor não encontrado';
                            }
                        })
                        .catch(error => console.error('Erro ao buscar valor de atendimento:', error));
                } else {
                    valorAtendimentoInput.value = '';
                }
            }

            // Adicionando os eventos 'change' para cada seleção relevante
            [profissionalSelect, areaSelect, especializacaoSelect, enderecoSelect].forEach(select => {
                select.addEventListener('change', () => {
                    const profissionalId = profissionalSelect.value;
                    const areaAtuacaoId = areaSelect.value;
                    const especializacaoId = especializacaoSelect.value;
                    const enderecoId = enderecoSelect.value;

                    fetchValorAtendimento(profissionalId, areaAtuacaoId, especializacaoId, enderecoId);
                });
            });
        });
    </script>
@endsection
