@extends ('LayoutsPadrao.inicio')

@section('titulo', 'RegistroVital')

@section('conteudo')

     <div class="mb-3">
         @include('profile.partials.update-profile-information-form')
     </div>

     <div class="mb-3">
         @include('profile.partials.update-password-form')
     </div>

     <div class="mb-3">
         @include('profile.partials.delete-user-form')
     </div>

@endsection
