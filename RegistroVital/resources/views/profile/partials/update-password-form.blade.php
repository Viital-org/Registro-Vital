<section>
    <header>
        <h2 class="mb-3">Atualizar Senha</h2>
        <p class="mb-3">Garanta que sua conta esta usando uma senha, longa e forte, para mante-la segura</p>
    </header>
    <form method="post" action="{{ route('password.update') }}" class="mb-3">
        @csrf
        @method('put')
        <div>
            <x-input-label for="update_password_current_password" :value="'Senha Atual'"/>
            <x-text-input id="update_password_current_password" name="current_password" type="password"
                          class="mb-3" autocomplete="current-password"/>
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="update_password_password" :value="'Nova Senha'"/>
            <x-text-input id="update_password_password" name="password" type="password" class="mb-3"
                          autocomplete="new-password"/>
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2"/>
        </div>

        <div>
            <x-input-label for="update_password_password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <button class="mb-3">Salvar</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
