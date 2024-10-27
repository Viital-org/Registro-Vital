<section class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-primary mb-2">Informações do Paciente</h2>
        <p class="text-gray-600">Atualize suas informações de paciente</p>
        <script src="{{asset("js/BuscaCep.js")}}"></script>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- CPF --}}
        <div class="flex flex-col">
            <x-input-label for="cpf" :value="'CPF'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="cpf"
                name="cpf"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->cpf"
                required/>
            <x-input-error :messages="$errors->get('cpf')" class="mt-2 text-red-500"/>
        </div>

        {{-- RG --}}
        <div class="flex flex-col">
            <x-input-label for="rg" :value="'RG'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="rg"
                name="rg"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->rg"
                required/>
            <x-input-error :messages="$errors->get('rg')" class="mt-2 text-red-500"/>
        </div>

        {{-- Data de Nascimento --}}
        <div class="flex flex-col">
            <x-input-label for="data_nascimento" :value="'Data de Nascimento'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="data_nascimento"
                name="data_nascimento"
                type="date"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->data_nascimento"
                required/>
            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2 text-red-500"/>
        </div>

        {{-- CEP --}}
        <div class="flex flex-col">
            <x-input-label for="cep" :value="'CEP'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="cep"
                name="cep"
                type="text"
                onblur="pesquisacep(this.value)"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->cep"
                required/>
            <x-input-error :messages="$errors->get('cep')" class="mt-2 text-red-500"/>
        </div>

        {{-- Cidade e Estado --}}
        <div class="flex flex-col">
            <x-input-label for="cidade" :value="'Cidade'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="cidade"
                name="cidade"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->cidade"
                required/>
            <x-input-error :messages="$errors->get('cidade')" class="mt-2 text-red-500"/>
        </div>

        <div class="flex flex-col">
            <x-input-label for="estado" :value="'Estado'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="uf"
                name="estado"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->estado"
                required/>
            <x-input-error :messages="$errors->get('estado')" class="mt-2 text-red-500"/>
        </div>

        <div class="flex flex-col">
            <x-input-label for="bairro" :value="'Bairro'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="bairro"
                name="bairro"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->bairro"
                required/>
            <x-input-error :messages="$errors->get('bairro')" class="mt-2 text-red-500"/>
        </div>

        {{-- Endereço (Rua e Número) --}}
        <div class="flex flex-col">
            <x-input-label for="rua_endereco" :value="'Endereço (Rua)'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="rua"
                name="rua_endereco"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->rua_endereco"
                required/>
            <x-input-error :messages="$errors->get('rua_endereco')" class="mt-2 text-red-500"/>
        </div>

        <div class="flex flex-col">
            <x-input-label for="numero_endereco" :value="'Número do Endereço'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="numero"
                name="numero_endereco"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->numero_endereco"
                required/>
            <x-input-error :messages="$errors->get('numero_endereco')" class="mt-2 text-red-500"/>
        </div>

        {{-- Gênero --}}
        <div class="flex flex-col">
            <x-input-label for="genero" :value="'Gênero'" class="font-semibold text-gray-700"/>
            <select
                id="genero"
                name="genero"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                required>
                <option value="">Selecione</option>
                <option value="M" @if($paciente->genero == 'M') selected @endif>Masculino</option>
                <option value="F" @if($paciente->genero == 'F') selected @endif>Feminino</option>
                <option value="O" @if($paciente->genero == 'O') selected @endif>Outro</option>
            </select>
            <x-input-error :messages="$errors->get('genero')" class="mt-2 text-red-500"/>
        </div>

        {{-- Estado Civil --}}
        <div class="flex flex-col">
            <x-input-label for="estado_civil" :value="'Estado Civil'" class="font-semibold text-gray-700"/>
            <select
                id="estado_civil"
                name="estado_civil"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                required>
                <option value="">Selecione</option>
                <option value="1" @if($paciente->estado_civil == 1) selected @endif>Solteiro(a)</option>
                <option value="2" @if($paciente->estado_civil == 2) selected @endif>Casado(a)</option>
                <option value="3" @if($paciente->estado_civil == 3) selected @endif>Divorciado(a)</option>
                <option value="4" @if($paciente->estado_civil == 4) selected @endif>Viúvo(a)</option>
            </select>
            <x-input-error :messages="$errors->get('estado_civil')" class="mt-2 text-red-500"/>
        </div>

        {{-- Tipo Sanguíneo --}}
        <div class="flex flex-col">
            <x-input-label for="tipo_sanguineo" :value="'Tipo Sanguíneo'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="tipo_sanguineo"
                name="tipo_sanguineo"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$paciente->tipo_sanguineo"
                required/>
            <x-input-error :messages="$errors->get('tipo_sanguineo')" class="mt-2 text-red-500"/>
        </div>

        {{-- Botão de Salvar --}}
        <div class="flex justify-end">
            <button
                class="px-4 py-2 bg-primary text-white font-bold rounded-md shadow hover:bg-primary-dark transition ease-in-out duration-150">
                Salvar Alterações
            </button>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('status') === 'role-info-updated')
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition
                 x-init="setTimeout(() => show = false, 2000)"
                 class="text-green-500 text-sm font-semibold mt-2">
                Alterações Salvas
            </div>
        @endif
    </form>


</section>
