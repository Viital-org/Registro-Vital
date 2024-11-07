@extends($layout)

@section('titulo', 'Logs de Atividades')

@section('conteudo')
    <div class="container my-5">
        <h2>Logs de Atividades</h2>

        <div class="mb-4">
            <a href="{{ route('logs.filter', ['type' => 'profile-edit']) }}" class="btn btn-primary">Logs de Edição de
                Perfil</a>
            <a href="{{ route('logs.filter', ['type' => 'login-logout']) }}" class="btn btn-secondary">Logs de
                Login/Logout</a>
            <a href="{{ route('administrador.logs') }}" class="btn btn-success">Mostrar Todos os Logs</a>
        </div>

        @if ($logs->isNotEmpty())
            <ul class="list-group">
                @foreach ($logs as $log)
                    <li class="list-group-item">
                        <strong>Data/Hora:</strong> {{ $log['timestamp'] }}<br>
                        <strong>Nível:</strong> {{ $log['level'] }}<br>
                        <strong>Mensagem:</strong> {{ $log['message'] }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>Não há logs disponíveis.</p>
        @endif
    </div>
@endsection
