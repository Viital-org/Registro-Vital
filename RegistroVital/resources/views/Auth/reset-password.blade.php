<x-guest-layout>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm p-4">
                    <h1 class="text-center mb-4">Redefinir Senha</h1>

                    <form method="POST" action="{{ route('password.store') }}">
                        @csrf

                        <!-- Token de Reset de Senha -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">

                        <!-- Endereço de E-mail -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Nova Senha -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Nova Senha</label>
                            <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Confirmar Nova Senha -->
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Nova Senha</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password">
                            @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Botão para Resetar Senha -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">Redefinir Senha</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>

