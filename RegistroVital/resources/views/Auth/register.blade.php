@extends($layout)

@section('titulo', 'Registro')

@section('conteudo')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h1 class="text-center mb-4">Registro de Usuário</h1>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Nome -->
                        <div class="mb-3">
                            <label for="nome_completo" class="form-label">Nome Completo</label>
                            <input type="text" name="nome_completo" id="nome_completo" aria-describedby="nameHelp"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('nome_completo') }}" required autocomplete="nome_completo" autofocus
                                   placeholder="Digite seu nome completo">
                            @error('name')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de Email</label>
                            <input type="email" name="email" id="email" aria-describedby="emailHelp"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autocomplete="email"
                                   placeholder="Digite seu email">
                            @error('email')
                            <span id="emailHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Campo de Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" id="password"
                                   class="form-control @error('password') is-invalid @enderror" required
                                   autocomplete="new-password" placeholder="Digite sua senha">
                            @error('password')
                            <span id="passwordHelp" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                            @enderror
                        </div>

                        <!-- Campo de Confirmação de Senha -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">Confirmar Senha</label>
                            <input type="password" name="password_confirmation" id="password-confirm"
                                   class="form-control @error('password_confirmation') is-invalid @enderror" required
                                   autocomplete="new-password" placeholder="Confirme sua senha">
                            @error('password_confirmation')
                            <span id="password-confirmHelp" class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
                            @enderror
                        </div>

                        <!-- Função -->
                        <div class="mb-3">
                            <label for="tipo_usuario" class="form-label">Tipo de usuário</label>
                            <select name="tipo_usuario" id="tipo_usuario" autocomplete="off"
                                    class="form-control @error('tipo_usuario') is-invalid @enderror" required>
                                <option value="" disabled selected>Escolha o tipo de usuário</option>
                                <option value="1" {{ old('tipo_usuario') == 1 ? 'selected' : '' }}>Paciente</option>
                                <option value="2" {{ old('tipo_usuario') == 2 ? 'selected' : '' }}>Profissional</option>
                                <option value="3" {{ old('tipo_usuario') == 3 ? 'selected' : '' }}>Administrador
                                </option>
                            </select>
                            @error('tipo_usuario')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Botão de Registro -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg w-100">Registrar</button>
                        </div>
                    </form>

                    <!-- Link para login -->
                    <p class="text-center mt-3">Já tem uma conta? <a href="{{ route('login') }}">Faça login aqui</a></p>
                </div>
            </div>
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection

