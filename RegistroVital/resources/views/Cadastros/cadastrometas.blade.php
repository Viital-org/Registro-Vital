@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de Metas')

@section ('conteudo')

    <form action="{{route('metas-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('metas-index') }} ">Listar metas</a>

        <br>

        <h1>Cadastro de Metas</h1>

        <br>

        <label for="meta">Meta</label>
        <input type="text" name="meta" id="meta" required>

        <br>
        <label for="data_inicio">Data de Inicio</label>
        <input type="date" name="data_inicio" id="data_inicio" required>

        <br>

        <label for="data_fim">Data de Fim</label>
        <input type="date" name="data_fim" id="data_fim" required>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
