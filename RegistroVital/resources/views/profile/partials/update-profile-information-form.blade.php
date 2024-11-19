@php
    use Illuminate\Contracts\Auth\MustVerifyEmail;
@endphp

<section class="container mx-auto p-6 bg-white rounded-lg shadow-lg">
    <header class="mb-6 text-center">
        <h2 class="text-2xl font-semibold text-gray-900 mb-2">Informações do Perfil</h2>
        <p class="text-gray-600 text-sm">Atualize suas informações pessoais e de E-mail</p>
    </header>

    {{-- Formulário de atualização do perfil --}}
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Nome --}}
        <div class="form-group">
            <label for="nome_completo" class="text-gray-800 font-medium text-sm">Nome Completo</label>
            <input
                id="nome_completo"
                name="nome_completo"
                type="text"
                class="form-control form-control-user"
                :value="old('nome_completo', $user->nome_completo)"
                required autofocus autocomplete="nome_completo"/>
            <x-input-error :messages="$errors->get('nome_completo')" class="mt-2 text-red-500"/>
        </div>

        {{-- E-mail --}}
        <div class="form-group">
            <label for="email" class="text-gray-800 font-medium text-sm">E-mail</label>
            <input
                id="email"
                name="email"
                type="email"
                class="form-control form-control-user"
                :value="old('email', $user->email)"
                required autocomplete="username"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500"/>

            @if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div class="mt-3">
                    <p class="text-yellow-500">
                        Seu endereço de e-mail não está verificado.
                        <button form="send-verification" class="text-primary font-semibold underline">
                            Clique aqui para reenviar a confirmação de e-mail
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 text-green-500">
                            Um novo link de verificação foi enviado para o seu e-mail.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        {{-- Botão de salvar alterações --}}
        <div class="form-group">
            <button
                type="submit"
                class="btn btn-primary btn-user btn-block py-2 px-6 rounded-lg shadow-md hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary transition duration-300">
                Salvar alterações
            </button>
        </div>

        {{-- Mensagem de sucesso --}}
        @if (session('status') === 'profile-updated')
            <div x-data="{ show: true }"
                 x-show="show"
                 x-transition
                 x-init="setTimeout(() => show = false, 2000)"
                 class="text-green-500 text-sm font-semibold">
                Alterações Salvas
            </div>
        @endif
    </form>
</section>

<!-- Incluir links do Bootstrap e SB Admin -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
