@extends ($layout)

@section('titulo', 'Listagem de Pacientes')

@section('conteudo')
    @csrf

    <h1>Listagem de Pacientes</h1>
    <br>

    <nav class="d-flex align-items-center justify-content-between" role="search">
        <form action="{{ route('pacientes.show') }}" method="post" class="d-flex w-100">
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
            <th scope="col">Nome</th>
            <th scope="col">Data de Nascimento</th>
            <th scope="col">CEP</th>
            <th scope="col">Endereço</th>
            <th scope="col">Cartão de Crédito</th>
            <th scope="col">Hobbies</th>
            <th scope="col">Doenças Crônicas</th>
            <th scope="col">Remédios Regulares</th>
            <th scope="col">Meta</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pacientes as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nome }}</td>
                <td>{{ $item->datanascimento }}</td>
                <td>{{ $item->cep }}</td>
                <td>{{ $item->endereco }}</td>
                <td>{{ $item->numcartaocred }}</td>
                <td>{{ $item->hobbies }}</td>
                <td>{{ $item->doencascronicas }}</td>
                <td>{{ $item->remediosregulares }}</td>
                <td>{{ $item->meta ?: 'Não definido' }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $pacientes->links() }}
    </div>

@endsection

