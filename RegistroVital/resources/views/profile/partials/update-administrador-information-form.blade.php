<section class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">Informações do Administrador</h2>
        <p class="text-gray-600 text-sm">Atualize suas informações de administrador</p>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Cargo --}}
        <div class="form-group">
            <label for="cargo" class="text-gray-800 font-medium text-sm">Cargo</label>
            <input
                id="cargo"
                name="cargo"
                type="text"
                class="form-control form-control-user"
                :value="$administrador->cargo"
                required
            />
            <x-input-error :messages="$errors->get('cargo')" class="mt-2 text-red-500"/>
        </div>

        {{-- Data de Criação --}}
        <div class="form-group">
            <label for="data_criacao" class="text-gray-800 font-medium text-sm">Data de Criação</label>
            <input
                id="data_criacao"
                name="data_criacao"
                type="date"
                class="form-control form-control-user"
                :value="$administrador->data_criacao"
                required
            />
            <x-input-error :messages="$errors->get('data_criacao')" class="mt-2 text-red-500"/>
        </div>

        {{-- Botão de Salvar --}}
        <div class="form-group flex justify-end">
            <button
                type="submit"
                class="btn btn-primary btn-user btn-block py-2 px-6 rounded-lg shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary transition duration-300"
            >
                Salvar Alterações
            </button>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('status') === 'role-info-updated')
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition
                 x-init="setTimeout(() => show = false, 2000)"
                 class="text-green-500 text-sm font-semibold">
                Alterações salvas com sucesso
            </div>
        @endif
    </form>
</section>
