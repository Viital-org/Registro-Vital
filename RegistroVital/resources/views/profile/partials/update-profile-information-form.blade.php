@php
    use Illuminate\Contracts\Auth\MustVerifyEmail;
@endphp

<section class="container mx-auto p-6 bg-white rounded-lg shadow-md">
    <header class="mb-6">
        <h2 class="text-2xl font-bold text-primary mb-2">Informações do Perfil</h2>
        <p class="text-gray-600">Atualize suas informações pessoais e de E-mail</p>
    </header>

    {{-- Form para reenvio de verificação de e-mail --}}
    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    {{-- Formulário de atualização do perfil --}}
    <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
        @csrf
        @method('patch')

        {{-- Nome --}}
        <div class="flex flex-col">
            <x-input-label for="nome_completo" :value="'Nome Completo'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="nome_completo"
                name="nome_completo"
                type="text"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
                :value="old('nome_completo', $user->nome_completo)"
                required autofocus autocomplete="nome_completo"/>
            <x-input-error :messages="$errors->get('nome_completo')" class="mt-2 text-red-500"/>
        </div>

        {{-- E-mail --}}
        <div class="flex flex-col">
            <x-input-label for="email" :value="'E-mail'" class="font-semibold text-gray-700"/>
            <x-text-input
                id="email"
                name="email"
                type="email"
                class="border-gray-300 focus:border-primary focus:ring-primary rounded-md shadow-sm"
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
        <div class="flex justify-end">
            <button
                class="px-4 py-2 bg-primary text-white font-bold rounded-md shadow hover:bg-primary-dark transition ease-in-out duration-150">
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
