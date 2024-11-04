@extends($layout)

@section('titulo', 'Esqueci minha senha')

@section('conteudo')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h1 class="text-center mb-4">Recuperar Senha</h1>

                    <!-- Mensagem de Sucesso -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Formulário de Recuperação de Senha -->
                    <form method="POST" action="{{ route('emailredefinicao') }}">
                        @csrf

                        <!-- Endereço de Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Endereço de Email</label>
                            <input type="email" name="email" id="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                            @enderror
                        </div>

                        <!-- Botão para Enviar o Email -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Enviar email de recuperação da senha
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

