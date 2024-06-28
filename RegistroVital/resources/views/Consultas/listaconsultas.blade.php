@extends($layout)

@section('titulo', 'Minhas Consultas')

@section('conteudo')
    <div class="container">
        <h1>Minhas Consultas</h1>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Status</th>
                <th>Profissional</th>
                <th>Paciente</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($consultas as $consulta)
                <tr>
                    <td>{{ $consulta->id }}</td>
                    <td>{{ $consulta->data }}</td>
                    <td>{{ $consulta->status }}</td>
                    <td>{{ $consulta->profissional->nome }}</td>
                    <td>{{ $consulta->paciente->nome }}</td>
                    <td>{{ $consulta->valor }}</td>
                    <td>
                        <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-primary">Detalhes</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $consultas->links() }}
    </div>
@endsection
