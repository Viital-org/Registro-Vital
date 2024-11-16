@extends($layout)

@section('titulo', 'Anotações do Paciente: ' . $consulta->paciente->usuario->nome_completo)

@section('conteudo')
    @csrf

    <h1>Anotações visíveis realizadas pelo paciente: {{ $consulta->paciente->usuario->nome_completo }}</h1>
    <br>

    <!-- Se não houver anotações, exibe uma mensagem -->
    @if($anotacoessaude->isEmpty())
        <div class="alert alert-info" role="alert">
            Não há anotações visíveis para este paciente.
        </div>
    @else
        <table class="table table-bordered table-striped">
            <thead>
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
                    <td>{{ \Carbon\Carbon::parse($item->data_anotacao)->format('d/m/Y H:i') }}</td> <!-- Formato de data mais legível -->
                </tr>
            @endforeach
            </tbody>
        </table>

        <!-- Paginação para facilitar a navegação -->
        <div class="pagination justify-content-end">
            {{ $anotacoessaude->links() }}
        </div>
    @endif
@endsection
