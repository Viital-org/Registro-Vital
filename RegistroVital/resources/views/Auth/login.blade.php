@extends ($layout)

@section('titulo', 'Login')

@section('conteudo')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <h1>Login</h1>

        <div class="mb-3">
            <label for="email" class="form-label">Endereço de E-Mail</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" name="password" id="password"
                   class="form-control @error('password') is-invalid @enderror" required
                   autocomplete="current-password">
            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <input type="checkbox" name="remember" class="form-check-input" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Lembre-se de mim</label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Login</button>
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">Esqueci minha senha</a>
            @endif
        </div>
    </form>
@endsection
