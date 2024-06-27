@extends ('LayoutsPadrao.inicio')

@section('titulo', 'RegistroVital')

@section('conteudo')

    <div class="mb-3">
        @include('profile.partials.update-profile-information-form')
    </div>

    @if ($user->role === 'paciente')
        <div class="mb-3">
            @include('profile.partials.update-paciente-information-form')
        </div>
    @elseif ($user->role === 'medico')
        <div class="mb-3">
            @include('profile.partials.update-profissional-information-form')
        </div>
    @endif

    <div class="mb-3">
        @include('profile.partials.update-password-form')
    </div>

    <div class="mb-3">
        @include('profile.partials.delete-user-form')
    </div>

@endsection
