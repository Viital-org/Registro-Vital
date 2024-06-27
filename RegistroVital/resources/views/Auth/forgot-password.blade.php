@extends ('LayoutsPadrao.inicio')

@section('titulo', 'Esqueci minha senha')

@section('conteudo')
    @if (session('status'))
        <div class="alert alert-success" role="alert"> {{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <h1>Recuperar senha</h1>
        <div>
            <label for="email" class="form-label">Endereço de Email</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Enviar email de recuperação da senha</button>
        </div>
@endsection
