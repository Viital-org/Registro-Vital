<section class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">Informações do Paciente</h2>
        <p class="text-gray-600 text-sm">Atualize suas informações de paciente</p>
        <script src="{{asset('js/BuscaCep.js')}}"></script>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="space-y-6">
        @csrf
        @method('patch')

        <!-- CPF -->
        <div class="form-group">
            <x-input-label for="cpf" :value="'CPF'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="cpf"
                name="cpf"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->cpf"
                required/>
            <x-input-error :messages="$errors->get('cpf')" class="mt-2 text-red-500"/>
        </div>

        <!-- RG -->
        <div class="form-group">
            <x-input-label for="rg" :value="'RG'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="rg"
                name="rg"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->rg"
                required/>
            <x-input-error :messages="$errors->get('rg')" class="mt-2 text-red-500"/>
        </div>

        <!-- Data de Nascimento -->
        <div class="form-group">
            <x-input-label for="data_nascimento" :value="'Data de Nascimento'"
                           class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="data_nascimento"
                name="data_nascimento"
                type="date"
                class="form-control form-control-user"
                :value="$paciente->data_nascimento"
                required/>
            <x-input-error :messages="$errors->get('data_nascimento')" class="mt-2 text-red-500"/>
        </div>

        <!-- CEP -->
        <div class="form-group">
            <x-input-label for="cep" :value="'CEP'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="cep"
                name="cep"
                type="text"
                onblur="pesquisacep(this.value)"
                class="form-control form-control-user"
                :value="$paciente->cep"
                required/>
            <x-input-error :messages="$errors->get('cep')" class="mt-2 text-red-500"/>
        </div>

        <!-- Cidade -->
        <div class="form-group">
            <x-input-label for="cidade" :value="'Cidade'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="cidade"
                name="cidade"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->cidade"
                required/>
            <x-input-error :messages="$errors->get('cidade')" class="mt-2 text-red-500"/>
        </div>

        <!-- Estado -->
        <div class="form-group">
            <x-input-label for="estado" :value="'Estado'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="uf"
                name="estado"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->estado"
                required/>
            <x-input-error :messages="$errors->get('estado')" class="mt-2 text-red-500"/>
        </div>

        <!-- Bairro -->
        <div class="form-group">
            <x-input-label for="bairro" :value="'Bairro'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="bairro"
                name="bairro"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->bairro"
                required/>
            <x-input-error :messages="$errors->get('bairro')" class="mt-2 text-red-500"/>
        </div>

        <!-- Endereço (Rua) -->
        <div class="form-group">
            <x-input-label for="rua_endereco" :value="'Endereço (Rua)'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="rua"
                name="rua_endereco"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->rua_endereco"
                required/>
            <x-input-error :messages="$errors->get('rua_endereco')" class="mt-2 text-red-500"/>
        </div>

        <!-- Número do Endereço -->
        <div class="form-group">
            <x-input-label for="numero_endereco" :value="'Número do Endereço'"
                           class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="numero"
                name="numero_endereco"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->numero_endereco"
                required/>
            <x-input-error :messages="$errors->get('numero_endereco')" class="mt-2 text-red-500"/>
        </div>

        <!-- Gênero -->
        <div class="form-group">
            <x-input-label for="genero" :value="'Gênero'" class="text-gray-800 font-medium text-sm"/>
            <select
                id="genero"
                name="genero"
                class="form-control form-control-user"
                required>
                <option value="">Selecione</option>
                <option value="M" @if($paciente->genero == 'M') selected @endif>Masculino</option>
                <option value="F" @if($paciente->genero == 'F') selected @endif>Feminino</option>
                <option value="O" @if($paciente->genero == 'O') selected @endif>Outro</option>
            </select>
            <x-input-error :messages="$errors->get('genero')" class="mt-2 text-red-500"/>
        </div>

        <!-- Estado Civil -->
        <div class="form-group">
            <x-input-label for="estado_civil" :value="'Estado Civil'" class="text-gray-800 font-medium text-sm"/>
            <select
                id="estado_civil"
                name="estado_civil"
                class="form-control form-control-user"
                required>
                <option value="">Selecione</option>
                <option value="1" @if($paciente->estado_civil == 1) selected @endif>Solteiro(a)</option>
                <option value="2" @if($paciente->estado_civil == 2) selected @endif>Casado(a)</option>
                <option value="3" @if($paciente->estado_civil == 3) selected @endif>Divorciado(a)</option>
                <option value="4" @if($paciente->estado_civil == 4) selected @endif>Viúvo(a)</option>
            </select>
            <x-input-error :messages="$errors->get('estado_civil')" class="mt-2 text-red-500"/>
        </div>

        <!-- Tipo Sanguíneo -->
        <div class="form-group">
            <x-input-label for="tipo_sanguineo" :value="'Tipo Sanguíneo'" class="text-gray-800 font-medium text-sm"/>
            <x-text-input
                id="tipo_sanguineo"
                name="tipo_sanguineo"
                type="text"
                class="form-control form-control-user"
                :value="$paciente->tipo_sanguineo"
                required/>
            <x-input-error :messages="$errors->get('tipo_sanguineo')" class="mt-2 text-red-500"/>
        </div>

        <!-- Botão de Salvar -->
        <div class="form-group">
            <button
                class="btn btn-primary btn-user btn-block py-2 px-6 rounded-lg shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary transition duration-300">
                Salvar Alterações
            </button>
        </div>

        <!-- Mensagem de sucesso -->
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

<!-- Incluir links do Bootstrap e SB Admin -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

