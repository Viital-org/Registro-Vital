@extends ('LayoutsPadrao.inicio')

@section('titulo', 'Registro')

@section('conteudo')

    <div class="mb-3">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Registro de Usuario</h1>

            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Endereço de Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autocomplete="email">
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
                       autocomplete="new-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirmar Senha</label>
                <input type="password" name="password_confirmation" id="password-confirm" class="form-control" required
                       autocomplete="new-password">
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Função</label>
                <select name="role" id="role" class="form-control @error('role') is-invalid @enderror" required>
                    <option value="paciente">paciente</option>
                    <option value="medico">medico</option>
                </select>
                @error('role')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Registro</button>
            </div>
        </form>
    </div>

@endsection

