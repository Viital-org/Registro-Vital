@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de tipos de anotacao')

@section ('conteudo')

    <form action="{{route('tipoanotacao-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('tipoanotacao-index') }} ">Listar tipos de anotacao</a>

        <h1>Cadastro de de Tipos de anotacao</h1>

        <br>

        <label for="cad_tipanot">Tipo/Codigo da anotacao</label>
        <input type="number" name="cad_tipanot" id="cad_tipanot" required>

        <br>

        <label for="desc_anotacao">Descricao da anotacao</label>
        <input type="text" name="desc_anotacao" id="desc_anotacao" required>

        <input type="submit" value="Enviar">

    </form>

@endsection