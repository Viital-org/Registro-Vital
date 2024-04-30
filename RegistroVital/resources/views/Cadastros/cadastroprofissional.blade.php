@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de profissionais')

@section ('conteudo')

    <form action="{{route('profissionais-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('profissionais-index') }} ">Listar Profissionais</a>

        <h1>Cadastro de profissionais</h1>

        <br>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" required>

        <br>

        <label for="areaatuacao_id">Area de atuacao:</label>
        <select name="areaatuacao_id" id="areaatuacao_id" required>
            @foreach($atuaareas as $atuaarea)
                <option value="{{ $atuaarea->id }}">{{ $atuaarea->area }}</option>
            @endforeach
        </select>

        <br>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" required>

        <br>

        <label for="enderecoatuacao">Endereco de atuacao</label>
        <input type="text" name="enderecoatuacao" id="enderecoatuacao" required>

        <br>

        <label for="localformacao">Local de formacao</label>
        <input type="text" name="localformacao" id="localformacao" required>

        <br>

        <label for="dataformacao">Data de formacao</label>
        <input type="date" name="dataformacao" id="dataformacao" required>

        <br>

        <label for="descricaoperfil">Descricao</label>
        <input type="text" name="descricaoperfil" id="descricaoperfil" required>

        <input type="submit" value="Enviar">

    </form>

@endsection
