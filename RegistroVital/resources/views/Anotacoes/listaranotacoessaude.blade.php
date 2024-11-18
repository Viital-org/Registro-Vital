@extends($layout)

@section('titulo', 'Listagem de Anotações')

@section('conteudo')
    @csrf
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fs-2 fw-bold mb-0"><span class="text-gradient d-inline">Minhas anotações</span></h1>
            </div>
            @foreach($anotacoessaude as $item)
                <div class="row gx-5 justify-content-center mt-3">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <div class="card overflow-hidden shadow rounded-4 border-0">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center justify-content-between">
                                    <!-- Parte esquerda -->
                                    <div class="p-4 w-100">
                                        <h4>
                                            {{ \Carbon\Carbon::parse($item->data_anotacao)->format('d/m/Y') }}
                                        </h4>

                                        <!-- Tipo e Visibilidade em linhas separadas -->
                                        <div class="fw-bolder">
                                            <p class="mb-1">
                                                Tipo: <i class="fw-normal">{{ $item->desc_anotacao }}</i>
                                            </p>
                                            <p>
                                                Visibilidade: <i class="fw-normal">{{ $item->visibilidade }}</i>
                                            </p>
                                        </div>

                                        <p class="fw-bolder mt-3">
                                            Descrição: <span class="fw-normal">{{ $item->anotacao }}</span>
                                        </p>
                                    </div>

                                    <!-- Parte direita -->
                                    <div class="d-flex align-items-start gap-2 p-3">
                                        <a href="{{ route('anotacoessaude-edit', ['id' => $item->id]) }}" class="btn btn-outline-primary btn-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                                 class="bi bi-pencil-square" viewBox="0 0 16 16">
                                                <path
                                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                <path fill-rule="evenodd"
                                                      d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                            </svg>
                                        </a>
                                        <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete{{ $item->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                                 viewBox="0 0 24 24">
                                                <path
                                                    d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z">
                                                </path>
                                            </svg>
                                        </button>

                                        <!-- Modal -->
                                        <form action="{{ route('anotacoessaude-delete', ['id'=> $item->id])}}" method="POST">
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
                                                            <p>Deseja realmente excluir a anotação '{{ $item->id }}'?</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                                Cancelar
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">Excluir</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <div class="pagination justify-content-end">
        {{ $anotacoessaude->links() }}
    </div>
@endsection
