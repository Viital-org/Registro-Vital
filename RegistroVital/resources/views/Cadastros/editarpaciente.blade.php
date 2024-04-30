@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Editar Informações de Paciente')

@section ('conteudo')

    <form action="{{ route('pacientes-update', ['id' => $paciente->id]) }}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('consultas-index') }} ">Listar pacientes</a>

        <br>

        <a href="{{ route('cadastropacientes.create') }} ">Cadastrar paciente</a>

        @method('PUT')

        <h1>Editar Dados do Paciente</h1>

        <br>

        <label for="nome">Nome</label>
        <input type="text" name="nome" id="nome" value="{{ $paciente->nome }}" required>

        <br>

        <label for="datanascimento">Data de Nascimento</label>
        <input type="date" name="datanascimento" id="datanascimento" value="{{$paciente->datanascimento}}" required>

        <br>

        <label for="cep">CEP</label>
        <input type="text" name="cep" id="cep" value="{{$paciente->cep}}" required>

        <br>

        <label for="endereco">Endereço</label>
        <input type="text" name="endereco" id="endereco" value="{{$paciente->endereco}}" required>

        <br>

        <label for="numcartaocred">Cartão de Crédito</label>
        <input type="text" name="numcartaocred" id="numcartaocred" value="{{$paciente->numcartaocred}}" required>

        <br>

        <label for="hobbies">Hobbies</label>
        <input type="text" name="hobbies" id="hobbies" value="{{$paciente->hobbies}}" required>

        <br>

        <label for="doencascronicas">Lista de Doenças Cronicas</label>
        <input type="text" name="doencascronicas" id="doencascronicas" value="{{$paciente->doencascronicas}}" required>

        <br>

        <label for="remediosregulares">Lista de Remedios Regulares</label>
        <input type="text" name="remediosregulares" id="remediosregulares" value="{{$paciente->remediosregulares}}"
               required>

        <br>

        <button type="submit">Salvar Alterações</button>

    </form>

@endsection
