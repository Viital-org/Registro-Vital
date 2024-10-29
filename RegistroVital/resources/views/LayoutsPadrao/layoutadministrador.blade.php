<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo')</title>

    <!-- Importação de arquivos JavaScript e CSS com Vite -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <!-- Sidebar -->
    <aside class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar sidebar-admin">
        <div class="d-flex flex-column align-items-center sidebar-header p-4">
            <img src="{{ asset('/img/cruz.png') }}" alt="Logo Registro Vital" class="logo img-fluid mb-2">
            <h3 class="titulo text-white">Registro Vital</h3>
            <h5 class="titulo">Administrador</h5>
        </div>

        <ul class="nav flex-column links">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('administrador.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> 
                    <p class="p-nav">Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('quemsomos') }}">
                    <i class="fas fa-users"></i>
                    <p class="p-nav">Quem somos</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ajuda') }}">
                    <i class="fas fa-question-circle"></i> 
                    <p class="p-nav">Ajuda</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('relatorios_administrador') }}">
                    <i class="fas fa-file-alt"></i> 
                    <p class="p-nav">Relatórios</p>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('administrador.logs') }}">
                    <i class="fas fa-history"></i> 
                    <p class="p-nav">Logs</p>
                </a>
            </li>
        </ul>

        <ul class="perfil nav flex-column links">
                <!-- Perfil Usuário -->
                <li class="user nav-item dropdown no-arrow">
                @auth
                    <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ asset('/img/avatar.png') }}" alt="Avatar do usuário" class="userImg img-fluid rounded-circle ms-2">
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
            </li>
        </ul>
    </aside>

    <!-- Conteúdo Principal -->
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 main-content">
        @yield('conteudo')
    </main>

</body>
</html>
