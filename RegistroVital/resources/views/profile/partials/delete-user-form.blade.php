<section class="mb-3">
    <header>
        <h2 class="mb-3"> Deletar Conta</h2>
        <p class="mb-3">Depois que sua conta for excluída, todos os dados e acessos serão excluídos permanentemente.
            Antes de excluir sua conta, verifique se tem certeza que quer realizar o processo e salve qualquer
            informação que você deseja reter</p>
    </header>
    <button class="btn btn-danger mb-3" x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">DELETAR CONTA
    </button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="mb-3">
            @csrf
            @method('delete')

            <h2 class="mb-3">Você tem certeza que deseja DELETAR esta conta?</h2>

            <p class="mb-3">Quando sua conta for excluída, todos os dados e acessos serão excluídos permanentemente.
                Porfavor, insira sua senha para confermar que você quer PERMANENTEMENTE DELETAR sua conta</p>

            <div class="mb-3">
                <x-input-label for="password" value="Senha" class="mb-3"/>

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="Sua Senha"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mb-3"/>
            </div>

            <div class="mb-3">
                <button class="btn btn-primary mb-3" x-on:click="$dispatch('close')">Cancelar</button>

                <button class="btn btn-danger mb-3">DELETAR CONTA</button>
            </div>
        </form>
    </x-modal>
</section>
