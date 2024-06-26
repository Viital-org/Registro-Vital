@extends ('layoutspadrao.inicio')

@section('titulo', 'Listagem de Agendamentos')

@section('conteudo')
    @csrf

    <br>

    <h1>Listagem Agendamentos</h1>

    <br>

    <nav class="d-flex align-items-center justify-content-between" role="search">
        <form action="{{ route('agendamentos-show') }}" method="post" class="d-flex w-100">
            @csrf
            <input class="form-control me-2 flex-grow-1" type="search" placeholder="Digite o ID" aria-label="Search">
            <button class="btn btn-light" type="submit">Buscar</button>
        </form>
    </nav>

    <br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Especialidade</th>
            <th scope="col">Profissional</th>
            <th scope="col">Paciente</th>
            <th scope="col">Data</th>
            <th scope="col">ID Consulta</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($agendamentos as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->tipo_especializacao}}</td>
                <td>{{$item->nome_profissional ?: 'Não definido' }}</td>
                <td>{{$item->nome_paciente}}</td>
                <td>{{$item->data_consulta}}</td>
                <td>{{$item->consulta_id}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $profissionais->links() }}
    </div>

@endsection

