@extends ($layout)

@section('titulo', 'RegistroVital')

@section('conteudo')

    {{-- Atualizar Informações do Perfil --}}
    <div class="mb-3">
        @include('profile.partials.update-profile-information-form')
    </div>

    {{-- Exibir formulário correspondente ao tipo de usuário --}}
    @if ($user->tipo_usuario === 1)
        {{-- Paciente --}}
        <div class="mb-3">
            @include('profile.partials.update-paciente-information-form')
        </div>
    @elseif ($user->tipo_usuario === 2)
        {{-- Profissional --}}
        <div class="mb-3">
            @include('profile.partials.update-profissional-information-form')
        </div>
    @elseif ($user->tipo_usuario === 3)
        {{-- Administrador --}}
        <div class="mb-3">
            @include('profile.partials.update-administrador-information-form')
        </div>
    @endif

    {{-- Atualizar Senha --}}
    <div class="mb-3">
        @include('profile.partials.update-password-form')
    </div>

    {{-- Deletar Conta de Usuário --}}
    <div class="mb-3">
        @include('profile.partials.delete-user-form')
    </div>

@endsection
