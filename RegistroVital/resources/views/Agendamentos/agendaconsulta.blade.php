@extends($layout)

@section('titulo', 'Agendar Consulta')

@section('conteudo')
    <div class="container">
        <h1>Agendar Consulta</h1>
        <form action="{{ route('agendamentos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="area_atuacao_id" class="form-label">Área de Atuação</label>
                <select name="area_atuacao_id" id="area_atuacao_id" class="form-select" required>
                    <option value="">Selecione a Área de Atuação</option>
                    @foreach($areasAtuacao as $area)
                        <option value="{{ $area->id }}">{{ $area->descricao_area }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="especializacao_id" class="form-label">Especialização</label>
                <select name="especializacao_id" id="especializacao_id" class="form-select" required>
                    <option value="">Selecione a Especialização</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="profissional_id" class="form-label">Profissional</label>
                <select name="profissional_id" id="profissional_id" class="form-select" required>
                    <option value="">Selecione o Profissional</option>
                </select>
            </div>

            <div class ="mb-3">
                <label for="endereco_id" class="form-label">Endereço</label>
                <select name="endereco_id" id="endereco_id" class="form-select" required>
                    <option value="">Selecione o endereço da consulta</option>
                </select>
            </div>

            <div class="input-group">
                <input type="text" aria-hidden="true" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="data_agendamento" class="form-label">Data do Agendamento</label>
                <input type="date" name="data_agendamento" id="data_agendamento" class="form-control" required
                       min="{{ date('Y-m-d') }}">
            </div>
            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>

    <!-- Include do jQuery-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- BUSCA A ESPECIALIZAÇÃO CONFORME A ÁREA DE ATUAÇÃO SELECIONADA **ALELUIA** -->
    <script>
        $(document).ready(function() {
            $('#area_atuacao_id').on('change', function() {
                var areaAtuacaoId = $(this).val();
                $('#especializacao_id').html('<option value="">Selecione a Especialização</option>');
                if (areaAtuacaoId) {
                    $.ajax({
                        url: '/agendamentos/' + areaAtuacaoId, // A rota correta
                        type: 'GET',
                        success: function(response) {
                            response.forEach(function(especializacao) {
                                $('#especializacao_id').append('<option value="' + especializacao.id + '">' + especializacao.descricao_especializacao + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Erro na requisição:', textStatus, errorThrown);
                            console.log('Resposta:', jqXHR.responseText); // Para ver o que está sendo retornado em caso de erro
                        }
                    });
                }
            });
        });
    </script>


    <!-- BUSCA O PROFISSIONAL CONFORME A ESPECIALIZAÇÃO SELECIONADA -->
    <script>
        $(document).ready(function() {
            $('#especializacao_id').on('change', function() {
                var especializacaoid = $(this).val();
                $('#profissional_id').html('<option value="">Selecione o Profissional</option>');
                if (especializacaoid) {
                    $.ajax({
                        url: '/agendamentosprofissionais/' + especializacaoid, // A rota correta
                        type: 'GET',
                        success: function(response) {
                            console.log('Resposta da requisição:', response);
                            response.forEach(function(identificacao) {
                                $('#profissional_id').append('<option value="' + identificacao.id + '">' + identificacao.nome_completo + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Erro na requisição:', textStatus, errorThrown);
                            console.log('Resposta:', jqXHR.responseText); // Para ver o que está sendo retornado em caso de erro
                        }
                    });
                }
            });
        });
    </script>

    <!-- API DOS CORREIOS PRA BUSCAR O CEP FICARÁ AQUI-->

@endsection
