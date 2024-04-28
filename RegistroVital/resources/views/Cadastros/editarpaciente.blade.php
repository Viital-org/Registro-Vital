@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Paciente')

@section ('conteudo')

    <form action="{{ route('pacientes-update', ['id' => $paciente->id]) }}" method="POST">

        @csrf

        @method('PUT')

        <h1>Editar Dados do Paciente</h1>

        <br>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $paciente->nome }}">

        <br>

        <label for="datanascimento">Data de Nascimento</label>
        <input type="date" name="datanascimento" id="datanascimento" value="{{$paciente->datanascimento}}">

        <br>

        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" value="{{$paciente->cep}}">

        <br>

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" value="{{$paciente->endereco}}">

        <br>

        <label for="numcartaocred">Cartão de Crédito</label>
        <input type="text" name="numcartaocred" id="numcartaocred" value="{{$paciente->numcartaocred}}">

        <br>

        <label for="hobbies">Hobbies</label>
        <input type="text" name="hobbies" id="hobbies" value="{{$paciente->hobbies}}">

        <br>

        <label for="doencascronicas">Lista de Doenças Cronicas</label>
        <input type="text" name="doencascronicas" id="doencascronicas" value="{{$paciente->doencascronicas}}">

        <br>

        <label for="remediosregulares">Lista de Remedios Regulares</label>
        <input type="text" name="remediosregulares" id="remediosregulares" value="{{$paciente->remediosregulares}}">

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
