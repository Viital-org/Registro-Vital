@php use Carbon\Carbon; @endphp
@extends($layout)

@section('titulo', 'Anotações do Paciente: ' . $consulta->paciente->usuario->nome_completo)

@section('conteudo')
    @csrf

    <div class="container mt-4">
        <!-- Título principal -->
        <h1 class="display-4 text-center mb-4">Anotações Visíveis
            de {{ $consulta->paciente->usuario->nome_completo }}</h1>

        <!-- Se não houver anotações, exibe uma mensagem -->
        @if($anotacoessaude->isEmpty())
            <div class="alert alert-info alert-dismissible fade show text-center" role="alert">
                <i class="fas fa-exclamation-circle"></i> Não há anotações visíveis para este paciente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Tipo de Anotação</th>
                        <th scope="col">Anotação</th>
                        <th scope="col">Data da Anotação</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($anotacoessaude as $item)
                        <tr>
                            <td>{{ $item->tipo_anotacao }}</td> <!-- Exibe tipo da anotação -->
                            <td>{{ $item->descricao_anotacao }}</td> <!-- Exibe a descrição da anotação -->
                            <td>{{ Carbon::parse($item->data_anotacao)->format('d/m/Y') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Paginação para facilitar a navegação -->
            <div class="pagination justify-content-center">
                {{ $anotacoessaude->links() }}
            </div>
        @endif
    </div>
@endsection
