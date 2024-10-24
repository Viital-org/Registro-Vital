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

                        <!-- Nome -->
                        <div class="mb-3" id="geral">
                            <label for="nome_completo" class="form-label">Nome Completo</label>
                            <input type="text" name="nome_completo" id="nome_completo" aria-describedby="nameHelp"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('nome_completo') }}" required autocomplete="nome_completo" autofocus
                                   placeholder="Nome completo">
                            @error('name')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <!-- CPF  -->
                        <div class="mb-3" id="geral">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" name="cpf" id="cpf"
                                   class="form-control @error('cpf') is-invalid @enderror"
                                   value="{{ old('cpf') }}" required autocomplete="cpf" autofocus
                                   placeholder="CPF">
                            @error('cpf')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- CNPJ - PROFISSIONAL -->
                        <div class="mb-3 campoprofissional">
                            <label for="cnpj" class="form-label">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj"
                                   class="form-control @error('cnpj') is-invalid @enderror"
                                   value="{{ old('cnpj') }}" required autocomplete="cnpj" autofocus
                                   placeholder="CNPJ">
                            @error('cnpj')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- EXPIRÊNCIA - PROFISSIONAL -->
                        <div class="mb-3 campoprofissional">
                            <label for="tempo_experiencia" class="form-label">Tempo de experiência (Em anos)</label>
                            <input type="NUMBER" name="tempo_experiencia" id="tempo_experiencia"
                                   class="form-control" required autocomplete="tempo_experiencia" autofocus
                                   placeholder="Ex: 2">
                        </div>

                        <!-- REGISTRO PROFISSIONAL - PROFISSIONAL -->
                        <div class="mb-3 campoprofissional">
                            <label for="registro_profissional" class="form-label">Registro profissional</label>
                            <input type="text" name="registro_profissional" id="registro_profissional"
                                   class="form-control @error('registro_profissional') is-invalid @enderror"
                                   value="{{ old('registro_profissional') }}" required autocomplete="registro_profissional" autofocus
                                   placeholder="CNPJ">
                            @error('registro_profissional')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- ÁREA DE ATUAÇÃO - PROFISSIONAL -->
                        <div class="mb-3 campoprofissional">
                            <label for="area_atuacao" class="form-label">Área de atuação</label>
                            <input type="text" name="area_atuacao" id="area_atuacao"
                                   class="form-control @error('area_atuacao') is-invalid @enderror"
                                   value="{{ old('area_atuacao') }}" required autocomplete="area_atuacao" autofocus
                                   placeholder="Área de atuação">
                            @error('area_atuacao')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- DATA NASCIMENTO - PACIENTE -->
                        <div class="mb-3 campopaciente" >
                            <label for="data_nascimento" class="form-label">Data de nascimento</label>
                            <input type="date" name="data_nascimento" id="data_Nascimento"
                                   class="form-control @error('data_nascimento') is-invalid @enderror"
                                   value="{{ old('data_nascimento') }}" required autocomplete="data_nascimento" autofocus
                                   placeholder="Data de nascimento">
                            @error('data_nascimento')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- GENERO  -->
                        <div class="mb-3">
                            <label for="data_nascimento" class="form-label">Genero</label>
                            <select required autofocus class="form-control" name="genero" id="genero">
                                <option value="F">Feminino</option>
                                <option value="M">Masculino</option>
                            </select>
                            @error('genero')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- ESTADO CIVIL - PACIENTE -->
                        <div class="mb-3 campopaciente">
                            <label for="estado_civil" class="form-label">Estado civil</label>
                            <select required autofocus class="form-control" name="estado_civil" id="estado_civil">
                                <option value="Solteiro(a)">Solteiro(a)</option>
                                <option value="Casado(a)">Casado(a)</option>
                                <option value="Divorciado(a)">Divorciado(a)</option>
                                <option value="Viúvo(a)">Viúvo(a)</option>
                                <option value="União estável">União estável</option>
                            </select>
                            @error('genero')
                            <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3" id="geral">
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
                        <div class="mb-3" id="geral">
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
                        <div class="mb-3" id="geral">
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


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Script para esconder e mostrar campos -->
    <script>
        $(document).ready(function() {
            function toggleFields(tipoUsuario) {
                // Esconde todos os campos primeiro
                $('.campopaciente').hide();
                $('.campoprofissional').hide();

                if (tipoUsuario == '1') {
                    $('.campopaciente').show();
                } else if (tipoUsuario == '2') {
                    $('.campoprofissional').show();
                } else{
                    $('.campopaciente').hide();
                    $('.campoprofissional').hide();
                }
            }

            // Executa ao carregar a página, com base no valor já selecionado (para edição)
            toggleFields($('#tipo_usuario').val());

            // Executa quando o valor do select mudar
            $('#tipo_usuario').on('change', function() {
                toggleFields($(this).val());
            });
        });
    </script>


@endsection

