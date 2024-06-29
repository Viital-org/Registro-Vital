@extends($layout)

@section('titulo', 'Anotações do Paciente')

@section('conteudo')
    @csrf

    <h1>Anotações Realizadas</h1>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Tipo de Anotação</th>
            <th scope="col">Anotação</th>
            <th scope="col">Data da Anotação</th>
        </tr>
        </thead>
        <tbody>
        @foreach($anotacoessaude as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->desc_anotacao }}</td>
                <td>{{ $item->anotacao }}</td>
                <td>{{ $item->data_anotacao }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end">
        {{ $anotacoessaude->links() }}
    </div>

@endsection
