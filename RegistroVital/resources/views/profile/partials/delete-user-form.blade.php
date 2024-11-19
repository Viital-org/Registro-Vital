<section class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">Deletar Conta</h2>
        <p class="text-gray-600 text-sm mb-4">Depois que sua conta for excluída, todos os dados e acessos serão excluídos permanentemente.
            Antes de excluir sua conta, verifique se tem certeza que quer realizar o processo e salve qualquer
            informação que você deseja reter.</p>
    </header>

    <button
        class="btn btn-danger py-2 px-6 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300"
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        DELETAR CONTA
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="space-y-6">
            @csrf
            @method('delete')

            <h2 class="text-xl font-semibold text-gray-900 mb-3">Você tem certeza que deseja DELETAR esta conta?</h2>

            <p class="text-gray-600 text-sm mb-6">Quando sua conta for excluída, todos os dados e acessos serão excluídos permanentemente.
                Por favor, insira sua senha para confirmar que você quer PERMANENTEMENTE DELETAR sua conta.</p>

            <div class="form-group">
                <x-input-label for="password" value="Senha" class="text-gray-800 font-medium text-sm"/>
                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="form-control form-control-user mb-3"
                    placeholder="Sua Senha"
                    required
                />
                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500"/>
            </div>

            <div class="flex items-center gap-4">
                <button
                    type="button"
                    class="btn btn-secondary py-2 px-6 rounded-lg shadow-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-300"
                    x-on:click="$dispatch('close')">
                    Cancelar
                </button>

                <button
                    type="submit"
                    class="btn btn-danger py-2 px-6 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 transition duration-300 ">
                    DELETAR CONTA
                </button>
            </div>
        </form>
    </x-modal>
</section>

<!-- Incluir links do Bootstrap e SB Admin -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
