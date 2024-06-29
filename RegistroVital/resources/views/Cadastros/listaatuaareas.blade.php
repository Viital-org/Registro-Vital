@extends($layout)

@section('titulo', 'Listagem de Áreas de Atuação')

@section('conteudo')
    @csrf

    &nbsp;

    <h1>Listagem de Áreas de Atuação</h1>

    <br>

    <nav class="d-flex align-items-center justify-content-between" role="search">
        <form action="{{ route('atuareas-show') }}" method="post" class="d-flex w-100">
            @csrf
            <input class="form-control me-2 flex-grow-1" type="search" name="search_id" placeholder="Digite o ID"
                   aria-label="Search">
            <button class="btn btn-light" type="submit">Buscar</button>
        </form>
    </nav>

    <br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Área</th>
            <th scope="col">Especializações</th>
            <th scope="col">Descrição</th>
            <th scope="col">Editar</th>
            <th scope="col">Excluir</th>
        </tr>
        </thead>
        <tbody>
        @foreach($atuaareas as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->area}}</td>
                <td>
                    @if($item->especializacoes->isNotEmpty())
                        {{ $item->especializacoes->pluck('especializacao')->implode(', ') }}
                    @else
                        Não definido
                    @endif
                </td>
                <td>{{$item->descricao}}</td>
                <th>
                    <a href="{{ route('atuaareas-edit', ['id' => $item->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                             class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path
                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd"
                                  d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </a>
                </th>
                <th>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#delete{{$item->id}}">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 24 24">
                            <path d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"></path>
                        </svg>
                    </button>
                    <form action="{{ route('atuaareas-delete', ['id'=> $item->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <!-- Modal -->
                        <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Confirmação de exclusão</h5>
                                    </div>
                                    <div class="modal-body">
                                        <p>Deseja realmente excluir o registro {{$item->id}}?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Excluir</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $atuaareas->links() }}
    </div>

@endsection
