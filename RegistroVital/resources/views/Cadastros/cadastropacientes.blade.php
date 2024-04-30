@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Cadastro de Pacientes')

@section ('conteudo')

    <form action="{{route('pacientes-store')}}" method="POST">

        @csrf

        <h1>Cadastro de Paciente</h1>

        <br>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome">

        <br>

        <label for="datanascimento">Data de Nascimento</label>
        <input type="date" name="datanascimento" id="datanascimento">

        <br>

        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" required>

        <br>

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" required>

        <br>

        <label for="numcartaocred">Cartão de Crédito</label>
        <input type="text" name="numcartaocred" id="numcartaocred" required>

        <br>

        <label for="hobbies">Hobbies</label>
        <input type="text" name="hobbies" id="hobbies" required>

        <br>

        <label for="doencascronicas">Lista de Doenças Cronicas</label>
        <input type="text" name="doencascronicas" id="doencascronicas" required>

        <br>

        <label for="remediosregulares">Lista de Remedios Regulares</label>
        <input type="text" name="remediosregulares" id="remediosregulares" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
