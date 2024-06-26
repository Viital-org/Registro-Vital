@extends ('layoutspadrao.inicio')

@section('titulo', 'Agendamentos de @nomeUser')

@section('conteudo')

    @csrf
    &nbsp;

    <h1>Consultas de agendamentos</h1>


    <nav class="d-flex align-items-center justify-content-between" role="search">
        <form action="{{ route('agendamentos-paciente-show') }}" method="post" class="d-flex w-100">
            @csrf
            <input type="date" name="" id="" class="form-control me-2 flex-grow-1">
            <button class="btn btn-light" type="submit">Buscar</button>
        </form>
    </nav>


    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Profissional</th>
            <th scope="col">Área</th>
            <th scope="col">Código da consulta</th>
            <th scope="col">Data</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($agendamento_paciente as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nome_profissional ?: 'Não definido' }}</td>
                <td>{{$item->tipo_especializacao}}</td>
                <td>{{$item->consulta_id}}</td>
                <td>{{$item->data_consulta}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $profissionais->links() }}
    </div>

@endsection
