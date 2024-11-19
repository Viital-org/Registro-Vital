<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<<<<<<< HEAD
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Título da página dinâmico -->
    <title> @yield('titulo')</title>
=======
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>
>>>>>>> develop

    <!-- Importação de arquivos CSS e JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
<<<<<<< HEAD
    <link href="{{ asset('resources/sass/app.css') }}" rel="stylesheet">

</head>
<body>
<!-- Conteúdo da página -->
<div class="container-fluid">

<<<<<<< HEAD
    <!-- Conteúdo principal com sidebar -->
    <div class="row">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
            <img src="{{ asset('/img/cruz.png') }}" style="max-width:3%; margin-left:1%"/>
            <a class="navbar-brand" href="/">Registro Vital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('paciente.dashboard') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('quemsomos') }}">Quem somos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">

                    <!-- Dropdown para Consulta -->
                    <div class="dropdown">
                        <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Agendamentos
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button onclick="window.location.href='{{ route('agendamentos.create') }}'"
                                        class="dropdown-item">Agendamento
                                </button>
                            </li>
                            <li>
                                <button onclick="window.location.href='{{ route('agendamentos.index') }}'"
                                        class="dropdown-item">Historico de Agendamentos
                                </button>
                            </li>
                            <li>
                                <button onclick="window.location.href='{{ route('consultas.index') }}'"
                                        class="dropdown-item">lista de Consultas
                                </button>
                            </li>
                        </ul>
                    </div>
                    <!-- Dropdown para Anotações -->
                    <div class="dropdown">
                        <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            Anotações
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <button onclick="window.location.href='{{ route('anotacoessaude-create') }}'"
                                        class="dropdown-item">Cadastrar Nova Anotação
                                </button>
                            </li>
                            <li>
                                <button onclick="window.location.href='{{ route('anotacoessaude-index') }}'"
                                        class="dropdown-item">Listar Anotações
                                </button>
                            </li>
                        </ul>
                    </div>

                    <!-- Dropdown para Perfil e Logout -->
                    <div class="dropdown">
                        <button class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                            <label>{{ Auth::user()->name }}</label>
                        </button>
                        <ul class="dropdown-menu">
                            <li>
                                <form method="GET" action="{{ route('profile.edit') }}" id="edit-form">
                                    @csrf
                                    <button type="submit"
                                            onclick="event.preventDefault(); document.getElementById('edit-form').submit();"
                                            class="dropdown-item">Editar Perfil
                                    </button>
                                </form>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" id="logout-form">
                                    @csrf
                                    <button type="submit"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                            class="dropdown-item">Sair
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
=======
    <!-- Sidebar -->
    <aside class="bg-gradient-primary sidebar-paciente sidebar-dark accordion" id="accordionSidebar sidebar-paciente">
        <div class="d-flex flex-column align-items-center sidebar-header p-4">
            <img src="{{ asset('/img/cruz.png') }}" alt="Logo Registro Vital" class="logo img-fluid mb-2">
            <h3 class="titulo text-white">Registro Vital</h3>
            <h5 class="titulo">Paciente</h5>
        </div>

        <ul class="nav flex-column links">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('paciente.dashboard') }}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quemsomos') }}">Quem somos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ajuda') }}">Ajuda</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('relatorios_paciente') }}">Relatórios</a>
            </li>
            <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="agendamentosDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Agendamentos</a>
                        <ul class="dropdown-menu" aria-labelledby="agendamentosDropdown">
                            <li>
                                <a class="dropdown-item" href="{{ route('agendamentos.create') }}">Agendar Consulta</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('agendamentos.index') }}">Histórico de Agendamentos</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('consultas.index') }}">Lista de Consultas</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="anotacoesDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Anotações</a>
                        <ul class="dropdown-menu" aria-labelledby="anotacoesDropdown">
                            <li><a class="dropdown-item" href="{{ route('anotacoessaude-create') }}">Cadastrar
                                    Anotação</a></li>
                            <li><a class="dropdown-item" href="{{ route('anotacoessaude-index') }}">Listar Anotações</a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="metasDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">Metas</a>
                        <ul class="dropdown-menu" aria-labelledby="metasDropdown">
                            <li><a class="dropdown-item" href="{{ route('metas.create') }}">Cadastrar Meta</a></li>
                            <li><a class="dropdown-item" href="{{ route('metas.index') }}">Listar Metas</a></li>
                        </ul>
                    </li>
>>>>>>> develop
                </ul>
=======
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        /* Sidebar padrão */
        .sidebar-paciente {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #A0D3E8; /* Azul claro */
            color: #000;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
            transform: translateX(-250px); /* Inicialmente escondida */
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            /* border-radius: 0 10px 10px 0; */
        }

        .sidebar-paciente:hover {
            transform: translateX(0); /* Exibe a sidebar ao passar o mouse */
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .main-content {
            padding: 20px;
            transition: margin-left 0.3s ease-in-out;
        }

        .nav-link, .dropdown-item {
            color: #000;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .nav-link i, .dropdown-item i {
            margin-right: 10px;
        }

        .nav-link.active {
            background-color: #007bff;
            color: white !important;
            border-radius: 5px;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .sidebar-paciente {
                width: 200px;
                transform: translateX(-200px); /* Ajusta para dispositivos menores */
            }
        }
    </style>
</head>
<body>
<!-- Botão para abrir/fechar a sidebar -->
<button class="sidebar-toggle" id="sidebarToggle">
    <i class="fas fa-bars"></i>
</button>

<!-- Sidebar -->
<aside class="sidebar-paciente" id="sidebarPaciente">
    <div class="d-flex flex-column align-items-center sidebar-header p-4 mt-4">
        <img src="{{ asset('/img/cruz.png') }}" alt="Logo Registro Vital" class="logo img-fluid mb-2">
        <h3 class="titulo text-dark">Registro Vital</h3>
        <h5 class="titulo">Paciente</h5>
    </div>

    <!-- Links do menu -->
    <ul class="nav flex-column links">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('paciente.dashboard') }}">
                <i class="fas fa-home"></i> Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('quemsomos') }}">
                <i class="fas fa-info-circle"></i> Quem somos
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('ajuda') }}">
                <i class="fas fa-question-circle"></i> Ajuda
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('relatorios_paciente') }}">
                <i class="fas fa-chart-bar"></i> Relatórios
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="agendamentosDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-calendar-alt"></i> Agendamentos
            </a>
            <ul class="dropdown-menu" aria-labelledby="agendamentosDropdown">
                <li><a class="dropdown-item" href="{{ route('agendamentos.create') }}"><i
                            class="fas fa-plus-circle"></i> Agendar Consulta</a></li>
                <li><a class="dropdown-item" href="{{ route('consultas.index') }}"><i class="fas fa-list"></i> Lista de
                        Consultas Atuais</a></li>
                <li><a class="dropdown-item" href="{{ route('agendamentos.index') }}"><i class="fas fa-history"></i>
                        Agendamentos Passados</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="anotacoesDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-clipboard"></i> Anotações
            </a>
            <ul class="dropdown-menu" aria-labelledby="anotacoesDropdown">
                <li><a class="dropdown-item" href="{{ route('anotacoessaude-create') }}"><i class="fas fa-plus"></i>
                        Cadastrar Anotação</a></li>
                <li><a class="dropdown-item" href="{{ route('anotacoessaude-index') }}"><i class="fas fa-list"></i>
                        Listar Anotações</a></li>
            </ul>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="metasDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-bullseye"></i> Metas
            </a>
            <ul class="dropdown-menu" aria-labelledby="metasDropdown">
                <li><a class="dropdown-item" href="{{ route('metas.create') }}"><i class="fas fa-plus"></i> Cadastrar
                        Meta</a></li>
                <li><a class="dropdown-item" href="{{ route('metas.index') }}"><i class="fas fa-list"></i> Listar Metas</a>
                </li>
            </ul>
        </li>
>>>>>>> develop

<<<<<<< HEAD
        <!-- Sidebar -->
        <div class="bg-light sidebar ml-5">
            <ul class="nav flex-column">

                <div class="dropdown">
                    <a class="nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Listagens
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('atuaareas-index') }}">Areas de atuacao</a></li>
                        <li><a class="dropdown-item" href="{{ route('especializacoes-index') }}">Especializações</a>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('agendamentos-index') }}">Agendamentos</a></li>
                        <li><a class="dropdown-item" href="{{ route('tipoanotacao-index') }}">Tipos de anotação</a></li>
                        <li><a class="dropdown-item" href="{{ route('dicas-index')}}">Dicas</a></li>
                        <li><a class="dropdown-item" href="{{ route('metas-index')}}">Metas</a></li>
                    </ul>
                </div>
            </ul>
        </div>

        <!-- Conteúdo principal -->
    </div>
    <div class="col-md-9 col-lg-9 pt-3 main-content">
        @yield('conteudo')
    </div>
</div>

=======
        <div class="perfil">
            @auth
                <a class="nav-link" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown"
                   aria-expanded="false">
                    <img src="{{ asset('/img/avatar.png') }}" alt="Avatar do usuário"
                         class="userImg img-fluid rounded-circle ms-2">
                    <span>{{ Auth::user()->nome_completo }}</span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li>
                        <a href="{{ route('profile.edit') }}" class="dropdown-item">Editar Perfil</a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <button type="submit" class="dropdown-item">Sair</button>
                        </form>
                    </li>
                </ul>
            @else
                <a class="nav-link" href="{{ route('login') }}">
                    <i class="fas fa-sign-in-alt"></i> Entrar
                </a>
            @endauth
        </div>
    </ul>
</aside>

<!-- Conteúdo principal -->
<main class="main-content" id="mainContent">
    @yield('conteudo')
</main>

<!-- Scripts -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const sidebar = document.getElementById("sidebarPaciente");
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebarStateKey = "sidebarState"; // Chave para salvar o estado no localStorage

        // Função para salvar o estado da sidebar no localStorage
        const saveSidebarState = (isVisible) => {
            localStorage.setItem(sidebarStateKey, isVisible ? "visible" : "hidden");
        };

        // Detecta largura da tela e ajusta o comportamento da sidebar
        const adjustSidebarForScreenSize = () => {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                // Comportamento para telas menores
                sidebar.style.transform = "translateX(-200px)";
                toggleBtn.style.display = "block"; // Mostra o botão toggle
            } else {
                // Comportamento para telas maiores
                const savedState = localStorage.getItem(sidebarStateKey);
                if (savedState === "visible") {
                    sidebar.style.transform = "translateX(0px)";
                } else {
                    sidebar.style.transform = "translateX(-300px)";
                }
                toggleBtn.style.display = "block"; // Oculta o botão toggle
            }
        };

        // Ajusta a sidebar no carregamento inicial
        adjustSidebarForScreenSize();

        // Reajusta ao redimensionar a janela
        window.addEventListener("resize", adjustSidebarForScreenSize);

        // Evento de clique para alternar o estado da sidebar
        toggleBtn.addEventListener("click", function () {
            const isHidden = sidebar.style.transform === "translateX(0px)";
            sidebar.style.transform = isHidden ? "translateX(-300px)" : "translateX(0px)";
            saveSidebarState(!isHidden); // Salvar o estado atualizado
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<<<<<<< HEAD


>>>>>>> develop
=======
>>>>>>> develop
</body>
</html>
