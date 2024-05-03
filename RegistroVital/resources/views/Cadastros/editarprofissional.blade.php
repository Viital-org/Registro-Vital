@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Profissional')

@section('conteudo')

    <form action="{{ route('profissionais-update', ['id' => $profissionais->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>
            <a href="{{ route('profissionais-index') }}" class="btn btn-outline-info">Listar Profissionais</a>
            <a href="{{ route('cadastroprofissional.create') }}" class="btn btn-outline-info">Cadastrar Profissional</a>
        </div>

        <h1>Editar Dados do Profissional</h1>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $profissionais->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="areaatuacao_id" class="form-label">Área de Atuação</label>
            <select name="areaatuacao_id" id="areaatuacao_id" class="form-select">
                <option value="" @if (is_null($profissionais->areaatuacao_id)) selected @endif>Não definido</option>
                @foreach($atuaareas as $atuaarea)
                    <option value="{{ $atuaarea->id }}" @if ($atuaarea->id === $profissionais->areaatuacao_id) selected @endif>{{ $atuaarea->area }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="especializacao_id" class="form-label">Especialização</label>
            <select name="especializacao_id" id="especializacao_id" class="form-select"></select>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $profissionais->email }}" required>
        </div>

        <div class="mb-3">
            <label for="enderecoatuacao" class="form-label">Endereço de Atuação</label>
            <input type="text" name="enderecoatuacao" id="enderecoatuacao" class="form-control" value="{{ $profissionais->enderecoatuacao }}" required>
        </div>

        <div class="mb-3">
            <label for="localformacao" class="form-label">Local de Formação</label>
            <input type="text" name="localformacao" id="localformacao" class="form-control" value="{{ $profissionais->localformacao }}" required>
        </div>

        <div class="mb-3">
            <label for="dataformacao" class="form-label">Data de Formação</label>
            <input type="date" name="dataformacao" id="dataformacao" class="form-control" value="{{ $profissionais->dataformacao }}" required>
        </div>

        <div class="mb-3">
            <label for="descricaoperfil" class="form-label">Descrição do Perfil</label>
            <input type="text" name="descricaoperfil" id="descricaoperfil" class="form-control" value="{{ $profissionais->descricaoperfil }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var especializacaoSelecionada = "{{ $profissionais->especializacao_id ?? '' }}";

            function carregarEspecializacoes(areaId) {
                if (areaId) {
                    $.ajax({
                        type: "GET",
                        url: "/especializacoes/" + areaId,
                    })
                        .done(function (data) {
                            $('#especializacao_id').html('<option value="">Não Definido</option>');
                            $.each(data, function (_, especializacao) {
                                $('#especializacao_id').append(`<option value="${especializacao.id}">${especializacao.especializacao}</option>`);
                            });

                            if (especializacaoSelecionada && $(`#especializacao_id option[value="${especializacaoSelecionada}"]`).length) {
                                $('#especializacao_id').val(especializacaoSelecionada);
                            }
                        })
                        .fail(function () {
                            console.error('Erro ao carregar especializações.');
                        });
                } else {
                    $('#especializacao_id').html('<option value="">Não Definido</option>');
                }
            }

            $('#areaatuacao_id').change(function () {
                carregarEspecializacoes($(this).val());
            });

            $('#areaatuacao_id').trigger('change');
        });
    </script>

@endsection

