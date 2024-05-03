@extends ('layoutspadrao.profissionais')

@section('titulo', 'Listagem de Agendamentos')

@section('conteudo')

    @csrf
    <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>

    <br>

    <h1>Listagem Agendamentos</h1>

    <br>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <form action="{{ route('agendamentos-show')}}" method="post">
            @csrf
            <input name="id" id="id" class="form-control mr-sm-2" type="search" placeholder="Digite o ID"
                   aria-label="Search">
            <button class="btn btn-primary" type="submit">Buscar</button>
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
@endsection

