<section class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-primary mb-2">Informações do Profissional</h2>
        <p class="text-gray-600 mb-4">Atualize suas informações de profissional</p>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- Área de Atuação -->
        <div class="flex flex-col">
            <x-input-label for="areaatuacao_id" :value="'Área de Atuação'" class="font-semibold text-gray-700"/>
            <select name="areaatuacao_id" id="areaatuacao_id"
                    class="form-select border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm">
                <option value="" @if (is_null($profissional->areaatuacao_id)) selected @endif>Não definido</option>
                @foreach($areasAtuacao as $atuaarea)
                    <option value="{{ $atuaarea->id }}"
                            @if ($atuaarea->id === $profissional->areaatuacao_id) selected @endif>
                        {{ $atuaarea->descricao_area }}
                    </option>
                @endforeach
            </select>
            <x-input-error :messages="$errors->get('areaatuacao_id')" class="mt-2 text-red-500"/>
        </div>

        <!-- Especialização -->
        <div class="flex flex-col">
            <x-input-label for="especializacao_id" :value="'Especialização'" class="font-semibold text-gray-700"/>
            <select name="especializacao_id" id="especializacao_id"
                    class="form-select border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"></select>
            <x-input-error :messages="$errors->get('especializacao_id')" class="mt-2 text-red-500"/>
        </div>

        <!-- Endereço de Atuação -->
        <div class="flex flex-col">
            <x-input-label for="enderecoatuacao" :value="'Endereço de Atuação'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="enderecoatuacao"
                name="enderecoatuacao"
                type="text"
                class="form-control border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$profissional->enderecoatuacao"
                required/>
            <x-input-error :messages="$errors->get('enderecoatuacao')" class="mt-2 text-red-500"/>
        </div>

        <!-- Local de Formação -->
        <div class="flex flex-col">
            <x-input-label for="localformacao" :value="'Local de Formação'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="localformacao"
                name="localformacao"
                type="text"
                class="form-control border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$profissional->localformacao"
                required/>
            <x-input-error :messages="$errors->get('localformacao')" class="mt-2 text-red-500"/>
        </div>

        <!-- Data de Formação -->
        <div class="flex flex-col">
            <x-input-label for="dataformacao" :value="'Data de Formação'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="dataformacao"
                name="dataformacao"
                type="date"
                class="form-control border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$profissional->dataformacao"
                required/>
            <x-input-error :messages="$errors->get('dataformacao')" class="mt-2 text-red-500"/>
        </div>

        <!-- Descrição do Perfil -->
        <div class="flex flex-col">
            <x-input-label for="descricaoperfil" :value="'Descrição do Perfil'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="descricaoperfil"
                name="descricaoperfil"
                type="text"
                class="form-control border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$profissional->descricaoperfil"
                required/>
            <x-input-error :messages="$errors->get('descricaoperfil')" class="mt-2 text-red-500"/>
        </div>

        <!-- Botão de Salvar -->
        <div class="flex justify-end">
            <button type="submit"
                    class="btn btn-primary px-6 py-2 rounded-lg shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary transition duration-300">
                Salvar Alterações
            </button>
        </div>

        <!-- Mensagem de Sucesso -->
        @if (session('status') === 'role-info-updated')
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition
                 x-init="setTimeout(() => show = false, 2000)"
                 class="text-green-500 text-sm font-semibold">
                Alterações Salvas
            </div>
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
