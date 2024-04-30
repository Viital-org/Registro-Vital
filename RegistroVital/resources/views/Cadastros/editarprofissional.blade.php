@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Profissional')

@section ('conteudo')

    <form action="{{ route('profissionais-update', ['id' => $profissionais->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('profissionais-index') }} ">Listar profissionais</a>

        <br>

        <a href="{{ route('cadastroprofissional.create') }} ">Cadastrar Profissional</a>

        @method('PUT')

        <h1>Editar Dados do Profissional</h1>

        <br>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $profissionais->nome}}" required>

        <br>

        <label for="areaatuacao_id">Área de atuação:</label>
        <select name="areaatuacao_id" id="areaatuacao_id">
            <option value="" @if (is_null($profissionais->areaatuacao_id)) selected @endif>Não definido</option>
            @foreach($atuaareas as $atuaarea)
                <option value="{{ $atuaarea->id }}"
                        @if ($atuaarea->id === $profissionais->areaatuacao_id) selected @endif>{{ $atuaarea->area }}</option>
            @endforeach
        </select>

        <br>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $profissionais->email}}" required>

        <br>

        <label for="enderecoatuacao">Endereco de atuacao</label>
        <input type="text" name="enderecoatuacao" id="enderecoatuacao" value="{{ $profissionais->enderecoatuacao}}"
               required>

        <br>

        <label for="localformacao">Local de formacao</label>
        <input type="text" name="localformacao" id="localformacao" value="{{ $profissionais->localformacao}}" required>

        <br>

        <label for="dataformacao">Data de formacao</label>
        <input type="date" name="dataformacao" id="dataformacao" value="{{ $profissionais->dataformacao}}" required>

        <br>

        <label for="descricaoperfil">Descricao</label>
        <input type="text" name="descricaoperfil" id="descricaoperfil" value="{{ $profissionais->descricaoperfil}}"
               required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
