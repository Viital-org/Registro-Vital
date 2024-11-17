@extends($layout)

@section('titulo', 'Login')

@section('conteudo')

    <div class="container card-login">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image justify-content-bottom">
                                <img src="{{ asset('/img/login.png') }}" class="img-fluid imagem-login">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bem vindo!</h1>
                                    </div>
                                    <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Campo de E-mail -->
                                    <div class="mb-3">
                                        <input
                                            placeholder="Endereço de E-Mail"
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
                                        <input
                                            placeholder="Senha"
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
                                </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('password.request') }}">Esqueceu a senha? Redefinir</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Já tem uma conta?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


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
