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
        .sidebar-profissional {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 250px;
            background-color: #003366; /* Azul mais escuro */
            color: #fff;
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
            transform: translateX(-250px); /* Inicialmente escondida */
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }

        .sidebar-profissional:hover {
            transform: translateX(0); /* Exibe a sidebar ao passar o mouse */
        }

        .sidebar-toggle {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1100;
            background-color: #006adb;
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

        .dropdown-menu {
            background-color: #ffffff;
            color: #003366;
        }

        .dropdown-item {
            color: black;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .dropdown-item:hover {
            background-color: #00509E;
            color: #ffffff;
        }

        .nav-link {
            color: #fff;
            font-size: 16px;
            display: flex;
            align-items: center;
        }

        .nav-link i, .dropdown-item i {
            margin-right: 10px;
        }

        .nav-link.active {
            background-color: #00509E;
            color: white !important;
            border-radius: 5px;
        }

        .nav-item {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            .sidebar-profissional {
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
<aside class="sidebar-profissional" id="sidebarProfissional">
    <div class="d-flex flex-column align-items-center sidebar-header p-4 mt-4">
        <img src="{{ asset('/img/cruz.png') }}" alt="Logo Registro Vital" class="logo img-fluid mb-2">
        <h3 class="titulo text-white">Registro Vital</h3>
        <h5 class="titulo text-white">Profissional</h5>
    </div>

    <!-- Links do menu -->
    <ul class="nav flex-column links">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('profissional.dashboard') }}">
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
            <a class="nav-link" href="">
                <i class="fas fa-chart-bar"></i> Relatórios
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="consultasDropdown" role="button"
               data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-calendar-check"></i> Consultas
            </a>
            <ul class="dropdown-menu" aria-labelledby="consultasDropdown">
                <li><a class="dropdown-item" href="{{ route('consultas.index') }}"><i class="fas fa-list"></i> Consultas
                        Agendadas</a></li>
                <li><a class="dropdown-item" href="{{ route('agendamentos.index') }}"><i class="fas fa-history"></i>
                        Histórico dos meus Agendamentos</a></li>
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
        const sidebar = document.getElementById("sidebarProfissional");
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebarStateKey = "sidebarState";

        const saveSidebarState = (isVisible) => {
            localStorage.setItem(sidebarStateKey, isVisible ? "visible" : "hidden");
        };

        const adjustSidebarForScreenSize = () => {
            const screenWidth = window.innerWidth;
            if (screenWidth <= 768) {
                sidebar.style.transform = "translateX(-200px)";
                toggleBtn.style.display = "block";
            } else {
                const savedState = localStorage.getItem(sidebarStateKey);
                sidebar.style.transform = savedState === "visible" ? "translateX(0px)" : "translateX(-300px)";
                toggleBtn.style.display = "block";
            }
        };

        adjustSidebarForScreenSize();
        window.addEventListener("resize", adjustSidebarForScreenSize);

        toggleBtn.addEventListener("click", function () {
            const isHidden = sidebar.style.transform === "translateX(0px)";
            sidebar.style.transform = isHidden ? "translateX(-300px)" : "translateX(0px)";
            saveSidebarState(!isHidden);
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
