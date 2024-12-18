@extends ($layout)

@section('titulo', 'Registro')

@section('conteudo')

<<<<<<< HEAD
    <div class="mb-3">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <h1>Registro de Usuario</h1>

<<<<<<< HEAD
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                       value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
=======
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
=======
    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image">
                        <img src="{{ asset('/img/registro.png') }}" class="img-fluid imagem-registro">
                    </div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Crie Sua Conta!</h1>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
>>>>>>> develop

                                <!-- Função -->
                                <div class="mb-3">
                                    <label for="tipo_usuario" class="form-label">Como deseja se cadastrar?</label>
                                    <select name="tipo_usuario" id="tipo_usuario" autocomplete="off"
                                            class="form-control @error('tipo_usuario') is-invalid @enderror" required>
                                        <option value="" disabled selected>Escolha o tipo de usuário</option>
                                        <option value="1" {{ old('tipo_usuario') == 1 ? 'selected' : '' }}>Paciente
                                        </option>
                                        <option value="2" {{ old('tipo_usuario') == 2 ? 'selected' : '' }}>
                                            Profissional
                                        </option>
                                        </option>
                                    </select>
                                    @error('tipo_usuario')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <!-- Nome -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="nome_completo" class="form-label">Nome Completo</label>
                                    <input type="text" name="nome_completo" id="nome_completo"
                                           aria-describedby="nameHelp"
                                           class="form-control @error('name') is-invalid @enderror"
                                           value="{{ old('nome_completo') }}" required autocomplete="nome_completo"
                                           autofocus
                                           placeholder="Nome completo">
                                    @error('name')
                                    <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <!-- CPF  -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="cpf" class="form-label">CPF</label>
                                    <input type="text" name="cpf" id="cpf"
                                           class="form-control @error('cpf') is-invalid @enderror"
                                           value="{{ old('cpf') }}" required autocomplete="cpf"
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
                                           value="{{ old('cnpj') }}"
                                           placeholder="CNPJ">
                                    @error('cnpj')
                                    <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <!-- EXPIRÊNCIA - PROFISSIONAL -->
                                <div class="mb-3 campoprofissional">
                                    <label for="tempo_experiencia" class="form-label">Tempo de experiência (Em
                                        anos)</label>
                                    <input type="NUMBER" name="tempo_experiencia" id="tempo_experiencia"
                                           class="form-control"
                                           placeholder="Ex: 2">
                                </div>

                                <!-- REGISTRO PROFISSIONAL - PROFISSIONAL -->
                                <div class="mb-3 campoprofissional">
                                    <label for="registro_profissional" class="form-label">Registro profissional</label>
                                    <input type="text" name="registro_profissional" id="registro_profissional"
                                           class="form-control @error('registro_profissional') is-invalid @enderror"
                                           value="{{ old('registro_profissional') }}"
                                           placeholder="Registro profissional">
                                    @error('registro_profissional')
                                    <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <!-- ÁREA DE ATUAÇÃO - PROFISSIONAL -->
                                <div class="mb-3 campoprofissional">
                                    <label for="area_atuacao_id" class="form-label">Área de Atuação</label>
                                    <select name="area_atuacao_id" id="area_atuacao_id" class="form-select">
                                        <option value="">Selecione a Área de Atuação</option>
                                        @foreach($areasAtuacao as $area)
                                            <option value="{{ $area->id }}">{{ $area->descricao_area }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- ESPECIALIZAÇÃO - PROFISSIONAL -->
                                <div class="mb-3 campoprofissional">
                                    <label for="especializacao_id" class="form-label">Especialização</label>
                                    <select name="especializacao_id" id="especializacao_id" class="form-select">
                                        <option value="">Selecione a Especialização</option>
                                    </select>
                                </div>

                                <!-- DATA NASCIMENTO - PACIENTE -->
                                <div class="mb-3 campopaciente">
                                    <label for="data_nascimento" class="form-label">Data de nascimento</label>
                                    <input type="date" name="data_nascimento" id="data_Nascimento"
                                           class="form-control @error('data_nascimento') is-invalid @enderror"
                                           value="{{ old('data_nascimento') }}"
                                           placeholder="Data de nascimento">
                                    @error('data_nascimento')
                                    <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <!-- GENERO  -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="genero" class="form-label">Genero</label>
                                    <select required class="form-control" name="genero" id="genero">
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
                                    <select class="form-control" name="estado_civil" id="estado_civil">
                                        <option value="1">Solteiro(a)</option>
                                        <option value="2">Casado(a)</option>
                                        <option value="3">Divorciado(a)</option>
                                        <option value="4">Viúvo(a)</option>
                                        <option value="5">União estável</option>
                                    </select>
                                    @error('estado_civil')
                                    <span id="nameHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="mb-3 campopaciente campoprofissional">
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

                                <!-- CEP -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="CEP" class="form-label">CEP</label>
                                    <input type="text" name="cep" id="cep" class="form-control"
                                           onblur="pesquisacep(this.value);">
                                </div>

                                <!-- ESTADO -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="uf" class="form-label">UF</label>
                                    <input type="text" name="uf" id="uf" class="form-control" readonly>
                                </div>

                                <!-- CIDADE -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="cidade" class="form-label">Cidade</label>
                                    <input type="text" name="cidade" id="cidade" class="form-control" readonly>
                                </div>

                                <!-- BAIRRO -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="bairro" class="form-label">Bairro</label>
                                    <input type="text" name="bairro" id="bairro" class="form-control" readonly>
                                </div>

                                <!-- RUA -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="rua" class="form-label">Rua</label>
                                    <input type="text" name="rua" id="rua" class="form-control" readonly>
                                </div>

                                <!-- COMPLEMENTO -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="complemento" class="form-label">Complemento</label>
                                    <input type="text" name="complemento" id="complemento" class="form-control">
                                </div>

                                <!-- NÚMERO -->
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="numero" class="form-label">Número</label>
                                    <input type="text" name="numero" id="numero" class="form-control">
                                </div>


                                <!-- CAMPO DE SENHA-->
                                <div class="mb-3 campopaciente campoprofissional">
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
                                <div class="mb-3 campopaciente campoprofissional">
                                    <label for="password-confirm" class="form-label">Confirmar Senha</label>
                                    <input type="password" name="password_confirmation" id="password-confirm"
                                           class="form-control @error('password_confirmation') is-invalid @enderror"
                                           required
                                           autocomplete="new-password" placeholder="Confirme sua senha">
                                    @error('password_confirmation')
                                    <span id="password-confirmHelp" class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>


                                <!-- Checkbox para aceitação dos termos de uso -->
                                <div class="mb-3">
                                    <input type="checkbox" id="aceito_termos"/>
                                    <label for="aceito_termos" class="form-label">
                                        Aceito os <a href="#" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                                     style="color: blue; text-decoration: underline; cursor: pointer;">Termos
                                            de
                                            uso</a>
                                    </label>
                                </div>

                                <!-- Botão de Registro -->
                                <div class="d-grid gap-2">
                                    <button type="submit" id="btnRegistrar"
                                            class="btn btn-primary btn-lg w-100 campopaciente campoprofissional"
                                            disabled>
                                        Registrar
                                    </button>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- INCLUDE DO JQUERY -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Script para esconder e mostrar campos -->
    <script>
        $(document).ready(function () {
            let cnpj = document.getElementById('cnpj');
            let registro_profissional = document.getElementById('registro_profissional');
            let area_atuacao = document.getElementById('area_atuacao_id');
            let especializacao = document.getElementById('especializacao_id');
            let estado_civil = document.getElementById('estado_civil');
            let data_nascimento = document.getElementById('data_Nascimento');


            function toggleFields(tipoUsuario) {
                // Esconde todos os campos primeiro
                $('.campopaciente').hide();
                $('.campoprofissional').hide();

                if (tipoUsuario == '1') {
                    $('.campopaciente').show();
                    estado_civil.setAttribute('required', 'required');
                    data_nascimento.setAttribute('required', 'required');
                } else if (tipoUsuario == '2') {
                    $('.campoprofissional').show();
                    cnpj.setAttribute('required', 'required');
                    registro_profissional.setAttribute('required', 'required');
                    area_atuacao.setAttribute('required', 'required');
                    especializacao.setAttribute('required', 'required');
                } else {
                    $('.campopaciente').hide();
                    $('.campoprofissional').hide();
                }
            }

            // Executa ao carregar a página, com base no valor já selecionado (para edição)
            toggleFields($('#tipo_usuario').val());

            // Executa quando o valor do select mudar
            $('#tipo_usuario').on('change', function () {
                toggleFields($(this).val());
            });
        });
    </script>

    <!-- BUSCA A ESPECIALIZAÇÃO CONFORME A ÁREA DE ATUAÇÃO SELECIONADA **ALELUIA** -->
    <script>
        $(document).ready(function () {
            $('#area_atuacao_id').on('change', function () {
                var areaAtuacaoId = $(this).val();
                $('#especializacao_id').html('<option value="">Selecione a Especialização</option>');
                if (areaAtuacaoId) {
                    $.ajax({
                        url: '/registroprofissional/' + areaAtuacaoId, // A rota correta
                        type: 'GET',
                        success: function (response) {
                            response.forEach(function (especializacao) {
                                $('#especializacao_id').append('<option value="' + especializacao.id + '">' + especializacao.descricao_especializacao + '</option>');
                            });
                        },
                        error: function (jqXHR, textStatus, errorThrown) {
                            console.error('Erro na requisição:', textStatus, errorThrown);
                            console.log('Resposta:', jqXHR.responseText); // Para ver o que está sendo retornado em caso de erro
                        }
                    });
                }
            });
        });
    </script>


    <!-- SCRIPT PARA LIBERAR O BOTÃO DE REGISTRO SÓ QUANDO ACEITAR OS TERMOS DE USO -->

    <script>
        $(document).ready(function () {
            // Habilitar/desabilitar o botão de registro com base na checkbox
            $('#aceito_termos').on('change', function () {
                $('#btnRegistrar').prop('disabled', !this.checked);
            });
        });
    </script>



    <!-- Modal para termos de uso -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
         aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @include('Documentoslegais.termosdeuso')
                </div>
>>>>>>> develop
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

