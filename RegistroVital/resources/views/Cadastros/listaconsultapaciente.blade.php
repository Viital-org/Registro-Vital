@extends ('layoutspadrao.inicio')

@section('titulo', 'Listagem de Dicas')

@section('conteudo')

    <form action="" method="post">
        @csrf

        <h1>Consulta de agendamentos</h1>
        <div class="mb-3">
            <label for=""></label>
        </div>
    </form>
    <div class="pagination justify-content-end">
        {{ $profissionais->links() }}
    </div>


@endsection
