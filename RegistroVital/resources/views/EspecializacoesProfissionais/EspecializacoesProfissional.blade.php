@extends($layout)

@section('titulo', 'Cadastro de Especializações')

@section('conteudo')

    <form action="{{ route('especializacao-profissional-store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="area_atuacao_id" class="form-label">Área de Atuação:</label>
            <select name="area_atuacao_id" id="area_atuacao_id" class="form-select" required>
                @foreach($areas_atuacao as $area_atuacao)
                    <option value="{{$area_atuacao->id}}">{{$area_atuacao->descricao_area}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="especializacao_id" class="form-label">Especialização:</label>
            <select name="especializacao_id" id="especializacao_id" class="form-select" required>
            </select>
        </div>

        <div class="mb-3">
            <label for="rqe" class="form-label">RQE:</label>
            <input name="rqe" id="rqe" class="form-control" required>
        </div>

        <div class="input-group mb-3">
            <button class="btn btn-outline-secondary" type="button" id="button-addon1" data-bs-toggle="modal" data-bs-target="#exampleModal">Definir endereço</button>
            <input type="text" class="form-control" id="endereco" name="endereco" aria-describedby="button-addon1" readonly placeholder="Endereço de atendimento">
        </div>

        <div class="mb-3">
            <label for="valor_consulta" class="form-label">Valor da consulta:</label>
            <input type="number" name="valor_consulta" id="valor_consulta" class="form-select" required>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
            <label class="form-check-label" for="inlineCheckbox1">1</label>
        </div>

        <input type="submit" value="Cadastrar">

        <!-- MODAL PARA INSERIR O ENDEREÇO -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Endereço</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="endereco-form">
                            <div class="mb-3">
                                <label for="cep" class="col-form-label">Cep</label>
                                <input type="text" class="form-control" id="cep" name="cep" onblur="pesquisacep(this.value)">
                            </div>

                            <div class="mb-3">
                                <label for="uf" class="col-form-label">Estado</label>
                                <input type="text" class="form-control" id="uf" name="uf" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="cidade" class="col-form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="bairro" class="col-form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="rua" class="col-form-label">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="complemento" class="col-form-label">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
                            </div>

                            <div class="mb-3">
                                <label for="numero" class="col-form-label">Número</label>
                                <input type="number" class="form-control" id="numero" name="numero">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- INCLUINDO O JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- BUSCA CEP -->
    <script src="{{asset('js/BuscaCep.js')}}"></script>

    <!-- BUSCA A ESPECIALIZAÇÃO CONFORME A ÁREA DE ATUAÇÃO SELECIONADA -->
    <script>
        $(document).ready(function() {
            $('#area_atuacao_id').on('change', function() {
                var areaAtuacaoId = $(this).val();
                $('#especializacao_id').html('<option value="">Selecione a Especialização</option>');
                if (areaAtuacaoId) {
                    $.ajax({
                        url: '/especializacaoprofissional/' + areaAtuacaoId,
                        type: 'GET',
                        success: function(response) {
                            response.forEach(function(especializacao) {
                                $('#especializacao_id').append('<option value="' + especializacao.id + '">' + especializacao.descricao_especializacao + '</option>');
                            });
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            console.error('Erro na requisição:', textStatus, errorThrown);
                            console.log('Resposta:', jqXHR.responseText);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        function altera() {
            // Captura os valores dos campos de entrada
            let nrua = document.getElementById("rua").value;
            let nnumero = document.getElementById("numero").value;
            let nbairro = document.getElementById("bairro").value;
            let ncidade = document.getElementById("cidade").value;
            let nestado = document.getElementById("uf").value;
            let ncep = document.getElementById("cep").value;
            let endereco = document.getElementById("endereco");

            // Concatena os valores e atualiza o conteúdo do elemento 'endereco'
            endereco.value = nrua + ", " + nnumero + " - " + nbairro + ", " + ncidade + " - " + nestado + ", " + ncep;
        }

        // Adiciona um evento de clique ao botão 'enviar'
        document.getElementById("enviar").addEventListener("click", function() {
            altera();
            // Fecha o modal após atualizar o endereço
            $('#exampleModal').modal('hide');
        });
    </script>

@endsection
