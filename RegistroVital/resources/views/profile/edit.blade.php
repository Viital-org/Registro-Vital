@extends($layout)

@section('titulo', 'Registro Vital')

@section('conteudo')

    <div class="container py-5">

        {{-- Atualizar Informações do Perfil --}}
        <div class="card mb-4 max-w-4xl mx-auto">
            <div class="card-header">
                <h5 class="mb-0">Atualizar Informações do Perfil</h5>
            </div>
            <div class="card-body">
                @include('profile.partials.update-profile-information-form')
            </div>
        </div>

        {{-- Exibir formulário correspondente ao tipo de usuário --}}
        @if ($user->tipo_usuario === 1)
            {{-- Paciente --}}
            <div class="card mb-4 max-w-4xl mx-auto">
                <div class="card-header">
                    <h5 class="mb-0">Atualizar Informações do Paciente</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-paciente-information-form')
                </div>
            </div>
        @elseif ($user->tipo_usuario === 2)
            {{-- Profissional --}}
            <div class="card mb-4 max-w-4xl mx-auto">
                <div class="card-header">
                    <h5 class="mb-0">Atualizar Informações do Profissional</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-profissional-information-form')
                </div>
            </div>
        @elseif ($user->tipo_usuario === 3)
            {{-- Administrador --}}
            <div class="card mb-4 max-w-4xl mx-auto">
                <div class="card-header">
                    <h5 class="mb-0">Atualizar Informações do Administrador</h5>
                </div>
                <div class="card-body">
                    @include('profile.partials.update-administrador-information-form')
                </div>
            </div>
        @endif

        {{-- Atualizar Senha --}}
        <div class="card mb-4 max-w-4xl mx-auto">
            <div class="card-header">
                <h5 class="mb-0">Atualizar Senha</h5>
            </div>
            <div class="card-body">
                @include('profile.partials.update-password-form')
            </div>
        </div>

        {{-- Deletar Conta de Usuário --}}
        <div class="card mb-4 max-w-4xl mx-auto">
            <div class="card-header">
                <h5 class="mb-0">Deletar Conta</h5>
            </div>
            <div class="card-body">
                @include('profile.partials.delete-user-form')
            </div>
        </div>

    </div>

@endsection
