<section>
    <header>
        <h2 class="mb-3">Informações do Profissional</h2>
        <p class="mb-3">Atualize suas informações de profissional</p>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="mb-3">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control"
                   value="{{ $profissional->cpf }}" required>
        </div>

        <div class="mb-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control"
                   value="{{ $profissional->cnpj }}">
        </div>

        <div class="mb-3">
            <label for="registro_profissional" class="form-label">Registro Profissional</label>
            <input type="text" name="registro_profissional" id="registro_profissional" class="form-control"
                   value="{{ $profissional->registro_profissional }}">
        </div>

        <div class="mb-3">
            <label for="areaatuacao_id" class="form-label">Área de Atuação</label>
            <select name="area_atuacao_id" id="areaatuacao_id" class="form-select" required>
                <option value="" @if (is_null($profissional->area_atuacao_id)) selected @endif>Não definido</option>
                @foreach($areasAtuacao as $atuaarea)
                    <option value="{{ $atuaarea->id }}"
                            @if ($atuaarea->id === $profissional->area_atuacao_id) selected @endif>
                        {{ $atuaarea->descricao_area }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="especializacao_id" class="form-label">Especialização</label>
            <select name="especializacao_id" id="especializacao_id" class="form-select">
                <option value="" @if (is_null($profissional->especializacao_id)) selected @endif>Não definido</option>
                {{-- Aqui, você pode carregar as especializações baseado na área de atuação selecionada --}}
            </select>
        </div>

        <div class="mb-3">
            <label for="genero" class="form-label">Gênero</label>
            <select name="genero" id="genero" class="form-select">
                <option value="" @if (is_null($profissional->genero)) selected @endif>Não definido</option>
                <option value="M" @if ($profissional->genero === 'M') selected @endif>Masculino</option>
                <option value="F" @if ($profissional->genero === 'F') selected @endif>Feminino</option>
                <option value="O" @if ($profissional->genero === 'O') selected @endif>Outro</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="tempo_experiencia" class="form-label">Tempo de Experiência (em anos)</label>
            <input type="number" name="tempo_experiencia" id="tempo_experiencia" class="form-control"
                   value="{{ $profissional->tempo_experiencia }}">
        </div>

        <div class="mb-3">
            <label for="data_criacao" class="form-label">Data de Criação</label>
            <input type="date" name="data_criacao" id="data_criacao" class="form-control"
                   value="{{ $profissional->data_criacao }}" required>
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
                                $('#especializacao_id').append(`<option value="${especializacao.id}">${especializacao.descricao_especializacao}</option>`);
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
