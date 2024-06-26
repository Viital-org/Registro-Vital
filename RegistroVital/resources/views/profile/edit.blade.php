@extends ('LayoutsPadrao.inicio')

@section('titulo', 'RegistroVital')

@section('conteudo')

     <div class="mb-3">
         @include('profile.partials.update-profile-information-form')
     </div>


            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
@endsection
