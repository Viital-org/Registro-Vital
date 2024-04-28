@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Profissional')

@section ('conteudo')

    <form action="{{ route('profissionais-update', ['id' => $profissional->id]) }}" method="POST">

        @csrf

        @method('PUT')

        <h1>Editar Dados do Profissional</h1>

        <br>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $profissional->nome}}" required>

        <br>

        <label for="areaatuacao">Area de atuacao</label>
        <input type="text" name="areaatuacao" id="areaatuacao" value="{{ $profissional->areaatuacao}}" required>

        <br>

        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" value="{{ $profissional->email}}" required>

        <br>

        <label for="enderecoatuacao">Endereco de atuacao</label>
        <input type="text" name="enderecoatuacao" id="enderecoatuacao" value="{{ $profissional->enderecoatuacao}}"
               required>

        <br>

        <label for="localformacao">Local de formacao</label>
        <input type="text" name="localformacao" id="localformacao" value="{{ $profissional->localformacao}}" required>

        <br>

        <label for="dataformacao">Data de formacao</label>
        <input type="date" name="dataformacao" id="dataformacao" value="{{ $profissional->dataformacao}}" required>

        <br>

        <label for="descricaoperfil">Descricao</label>
        <input type="text" name="descricaoperfil" id="descricaoperfil" value="{{ $profissional->descricaoperfil}}"
               required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
