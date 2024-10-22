<section class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-primary mb-2">Informações do Administrador</h2>
        <p class="text-gray-600">Atualize suas informações de administrador</p>
    </header>

    <form method="post" action="{{ route('profile.updateRoleInfo') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Cargo --}}
        <div class="flex flex-col">
            <x-input-label for="cargo" :value="'Cargo'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="cargo"
                name="cargo"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$administrador->cargo"
                required/>
            <x-input-error :messages="$errors->get('cargo')" class="mt-2 text-red-500"/>
        </div>

        {{-- Data de Criação --}}
        <div class="flex flex-col">
            <x-input-label for="data_criacao" :value="'Data de Criação'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="data_criacao"
                name="data_criacao"
                type="date"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="$administrador->data_criacao"
                required/>
            <x-input-error :messages="$errors->get('data_criacao')" class="mt-2 text-red-500"/>
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
                 class="text-green-500 text-sm font-semibold">
                Alterações salvas com sucesso
            </div>
        @endif
    </form>
</section>
