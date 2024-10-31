@extends($layout)

@section('titulo', 'Minhas especializações')

@section('conteudo')
    <div class="container">
        <h1>Minhas Especializações</h1>

        <a href="{{ route('profissional.especializacoes') }}" class="btn btn-primary mb-3">Cadastrar atuação</a>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Área de atuação</th>
                <th>Especialização</th>
                <th>RQE</th>
                <th>Endereço</th>
                <th>Valor por atendimento</th>
                <th>Excluir</th>
            </tr>
            </thead>
            <tbody>
            @foreach($especializacoesprofissional as $especializacaoprofissional)
                <tr>
                    <td>{{ $especializacaoprofissional->id }}</td>
                    <td>{{ $especializacaoprofissional->areas_atuacao->descricao_area ?? 'N/A' }}</td>
                    <td>{{ $especializacaoprofissional->especializacoes->descricao_especializacao ?? 'N/A' }}</td>
                    <td>{{ $especializacaoprofissional->rqe }}</td>
                    <td>{{ $especializacaoprofissional->enderecos->rua . ',' . $especializacaoprofissional->enderecos->numero_endereco . ' - ' . $especializacaoprofissional->enderecos->bairro . ', ' . $especializacaoprofissional->enderecos->cidade . '-' . $especializacaoprofissional->enderecos->uf . ', ' .  $especializacaoprofissional->enderecos->cep}}</td>
                    <td>{{ $especializacaoprofissional->valor_atendimento }}</td>
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#delete{{ $especializacaoprofissional->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20"
                                 viewBox="0 0 24 24">
                                <path
                                    d="M 10.806641 2 C 10.289641 2 9.7956875 2.2043125 9.4296875 2.5703125 L 9 3 L 4 3 A 1.0001 1.0001 0 1 0 4 5 L 20 5 A 1.0001 1.0001 0 1 0 20 3 L 15 3 L 14.570312 2.5703125 C 14.205312 2.2043125 13.710359 2 13.193359 2 L 10.806641 2 z M 4.3652344 7 L 5.8925781 20.263672 C 6.0245781 21.253672 6.877 22 7.875 22 L 16.123047 22 C 17.121047 22 17.974422 21.254859 18.107422 20.255859 L 19.634766 7 L 4.3652344 7 z"/>
                            </svg>
                        </button>
                        <form action="{{ route('excluirespecializacao.destroy', ['id'=> $especializacaoprofissional->id])}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal fade" id="delete{{ $especializacaoprofissional->id }}" tabindex="-1" role="dialog"
                                 aria-labelledby="deleteModalLabel{{ $especializacaoprofissional->id }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $especializacaoprofissional->id }}">Confirmação de
                                                Exclusão</h5>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja realmente excluir a especializacao '{{ $especializacaoprofissional->especializacoes->descricao_especializacao}}'?</p>
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

        {{ $especializacoesprofissional->links()}}
    </div>
@endsection
