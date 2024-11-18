<section class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">Atualizar Senha</h2>
        <p class="text-gray-600 text-sm">Garanta que sua conta esteja usando uma senha longa e forte para mantê-la segura.</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')

        {{-- Senha Atual --}}
        <div class="form-group">
            <label for="update_password_current_password" class="text-gray-800 font-medium text-sm">Senha Atual</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                class="form-control form-control-user"
                autocomplete="current-password"
                required
            />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-red-500"/>
        </div>

        {{-- Nova Senha --}}
        <div class="form-group">
            <label for="update_password_password" class="text-gray-800 font-medium text-sm">Nova Senha</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                class="form-control form-control-user"
                autocomplete="new-password"
                required
            />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-red-500"/>
        </div>

        {{-- Confirmar Senha --}}
        <div class="form-group">
            <label for="update_password_password_confirmation" class="text-gray-800 font-medium text-sm">Confirmar Senha</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                class="form-control form-control-user"
                autocomplete="new-password"
                required
            />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-red-500"/>
        </div>

        {{-- Botão de salvar --}}
        <div class="form-group">
            <button
                type="submit"
                class="btn btn-primary btn-user btn-block py-2 px-6 rounded-lg shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary transition duration-300"
            >
                Salvar
            </button>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('status') === 'password-updated')
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition
                 x-init="setTimeout(() => show = false, 2000)"
                 class="text-green-500 text-sm font-semibold">
                Alteração Salva
            </div>
        @endif
    </form>
</section>

<!-- Incluir links do Bootstrap e SB Admin -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
