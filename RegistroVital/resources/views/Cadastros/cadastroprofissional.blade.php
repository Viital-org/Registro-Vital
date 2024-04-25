@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de profissionais')

@section ('conteudo')

<form action="/Cadastros" method="POST">

<h1>Cadastro de profissionais</h1>

<br>

<label for="areaatuacao">Area de atuacao</label>
<input type="text" name="areaatuacao" id="areaatuacao">

<br>

<label for="email">E-mail</label>
<input type="email" name="id" id="email">

<br>

<label for="enderecoatuacao">Endereco de atuacao</label>
<input type="text" name="enderecoatuacao" id="enderecoatuacao">

<br>

<label for="localformacao">Local de formacao</label>
<input type="text" name="localformacao" id="localformacao">

<br>

<label for="dataformacao">Data de formacao</label>
<input type="date" name="dataformacao" id="dataformacao">

<br>

<label for="descricaoperfil">Data de formacao</label>
<input type="text" name="descricaoperfil" id="descricaoperfil">


<input type="hidden" name="_token" value="{{ csrf_token() }}" />
</form>

@endsection