@extends($layout)

@section('titulo', 'Login')

@section('conteudo')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Formulário de Login -->
                <div class="card shadow-sm p-4">
                    <h1 class="text-center mb-4">Login</h1>

                    <!-- Exibe mensagem de erro caso o usuário esteja bloqueado -->
                    @if ($errors->has('email'))
                        <div class="alert alert-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Campo de E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de E-Mail</label>
                            <input
                                type="email"
                                name="email"
                                id="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
                                autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Campo de Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input
                                type="password"
                                name="password"
                                id="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Opção de "Lembre-se de mim" -->
                        <div class="form-check mb-3">
                            <input
                                type="checkbox"
                                name="remember"
                                class="form-check-input"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">Lembre-se de mim</label>
                        </div>

                        <!-- Botões -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Entrar</button>
                            <a class="btn btn-link text-center" href="{{ route('password.request') }}">Esqueci minha
                                senha</a>
                            <a class="btn btn-link text-center" href="{{ route('register') }}">Ainda não tem uma conta?
                                Cadastre-se</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Estilos customizados -->
    <style>
        .card {
            border: none;
            border-radius: 0.75rem;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .btn-link {
            color: #6c757d;
            text-decoration: none;
        }

        .btn-link:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
@endsection
