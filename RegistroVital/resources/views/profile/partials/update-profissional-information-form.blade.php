<section>
    <header>
        <h2 class="mb-3">Informações do Profissional</h2>
        <p class="mb-3">Atualize suas informações de profissional</p>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="mb-3">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="areaatuacao_id" class="form-label">Área de Atuação</label>
            <select name="areaatuacao_id" id="areaatuacao_id" class="form-select">
                <option value="" @if (is_null($profissional->areaatuacao_id)) selected @endif>Não definido</option>
                @foreach($atuaareas as $atuaarea)
                    <option value="{{ $atuaarea->id }}"
                            @if ($atuaarea->id === $profissional->areaatuacao_id) selected @endif>{{ $atuaarea->area }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="especializacao_id" class="form-label">Especialização</label>
            <select name="especializacao_id" id="especializacao_id" class="form-select"></select>
        </div>

        <div class="mb-3">
            <label for="enderecoatuacao" class="form-label">Endereço de Atuação</label>
            <input type="text" name="enderecoatuacao" id="enderecoatuacao" class="form-control"
                   value="{{ $profissional->enderecoatuacao }}" required>
        </div>

        <div class="mb-3">
            <label for="localformacao" class="form-label">Local de Formação</label>
            <input type="text" name="localformacao" id="localformacao" class="form-control"
                   value="{{ $profissional->localformacao }}" required>
        </div>

        <div class="mb-3">
            <label for="dataformacao" class="form-label">Data de Formação</label>
            <input type="date" name="dataformacao" id="dataformacao" class="form-control"
                   value="{{ $profissional->dataformacao }}" required>
        </div>

        <div class="mb-3">
            <label for="descricaoperfil" class="form-label">Descrição do Perfil</label>
            <input type="text" name="descricaoperfil" id="descricaoperfil" class="form-control"
                   value="{{ $profissional->descricaoperfil }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>

        @if (session('status') === 'role-info-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="mb-3"
            >Alterações Salvas</p>
        @endif
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            var especializacaoSelecionada = "{{ $profissional->especializacao_id ?? '' }}";

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

                            if (especializacaoSelecionada) {
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
</section>

