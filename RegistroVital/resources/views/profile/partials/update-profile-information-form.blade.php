@php use Illuminate\Contracts\Auth\MustVerifyEmail; @endphp
<section>
    <header>
        <h2 class=class="mb-3">Informação do Perfil</h2>
        <p class="mb-3">Atualiza suas informações de perfil e E-mail</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mb-3">
        @csrf
        @method('patch')
        <div>
            <x-input-label for="name" :value="'Nome'"/>
            <x-text-input id="name" name="name" type="text" class="mb-3" :value="old('name', $user->name)" required autofocus autocomplete="name"/>
            <x-input-error class="mt-2" :messages="$errors->get('name')"/>
        </div>

        <div>
            <x-input-label for="email" :value="'E-mail'"/>
            <x-text-input id="email" name="email" type="email" class="mb-3" :value="old('email', $user->email)" required autocomplete="username"/>
            <x-input-error class="mt-2" :messages="$errors->get('email')"/>

            @if ($user instanceof MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="mb-3">
                        Seu endereço de email não está verificado
                        <button form="send-verification"
                                class="mb-3">
                            Clique aqui para reenviar a confirmação de e-mail
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mb-3">
                            Um novo link de verificação foi enviado para o seu e-mail
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="mb-3">
            <button>Salvar alterações</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="mb-3"
                >Alterações Salvas</p>
            @endif
        </div>
    </form>
</section>
