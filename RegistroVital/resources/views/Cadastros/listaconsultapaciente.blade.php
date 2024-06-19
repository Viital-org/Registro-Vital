@extends ('layoutspadrao.inicio')

@section('titulo', 'Listagem de Dicas')

@section('conteudo')

<form action="" method="post">
    @csrf

    <h1>Consulta de agendamentos nome_pacinte</h1>
    <div class="mb-3">
        <label for="">Data</label>
    </div>
</form>


@endsection
