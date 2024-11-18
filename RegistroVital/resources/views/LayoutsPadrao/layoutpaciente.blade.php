<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('titulo')</title>

    <!-- Importação de arquivos CSS e JS -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
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
</body>
</html>
