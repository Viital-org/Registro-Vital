@extends($layout)

@section('titulo', 'Listagem de Especializações')

@section('conteudo')
    @csrf

    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4">Especializações</h1>
            <a href="{{ route('especializacoes-create') }}" class="btn btn-primary">
                Cadastrar Especialização
            </a>
        </div>
        <form action="{{ route('especializacoes-show') }}" method="post" class="d-flex w-100">
            @csrf
            <input class="form-control me-2 flex-grow-1" type="search" name="search_id" placeholder="Ex: Derm"
                   aria-label="Search">
            <button class="btn btn-light" type="submit">Buscar</button>
        </form>

        <br>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th scope="col">Especialização</th>
                    <th scope="col">Área de Atuação</th>
                    <th scope="col" class="text-center">Editar</th>
                    <th scope="col" class="text-center">Excluir</th>
                </tr>
                </thead>
                <tbody>
                @foreach($especializacoes as $item)
                    <tr>
                        <td>{{ $item->descricao_especializacao }}</td>
                        <td>{{ $item->area->descricao_area ?: 'Não definido' }}</td>
                        <td class="text-center">
                            <a href="{{ route('especializacoes-edit', ['id' => $item->id]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                     class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd"
                                          d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                </svg>
                            </a>
                        </td>
                        <td class="text-center">
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $item->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                     viewBox="0 0 24 24">
                                    <path
                                        d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                                    </path>
                                </svg>
                            </button>

                            <form action="{{ route('especializacoes-delete', ['id'=> $item->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal fade" id="delete{{ $item->id }}" tabindex="-1" role="dialog"
                                     aria-labelledby="deleteModalLabel{{ $item->id }}" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel{{ $item->id }}">Confirmação de
                                                    Exclusão</h5>
                                            </div>
                                            <div class="modal-body">
                                                <p>Deseja realmente excluir a especialização '{{ $item->especializacao }}'?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-primary">Excluir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination justify-content-end">
            {{ $especializacoes->links() }}
        </div>
@endsection
