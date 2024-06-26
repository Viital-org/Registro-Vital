<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

     <div class="mb-3">
         @include('profile.partials.update-password-form')
     </div>

     <div class="mb-3">
         @include('profile.partials.delete-user-form')
     </div>

@endsection
