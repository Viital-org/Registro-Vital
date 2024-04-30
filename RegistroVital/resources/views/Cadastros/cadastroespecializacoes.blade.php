@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Cadastro de Especializações')

@section ('conteudo')

    <form action="{{route('especializacoes-store')}}" method="POST">

        @csrf

        <h1>Cadastro de Especialização</h1>

        <br>

        <label for="especializacao">Especialização</label>
        <input type="text" name="especializacao" id="especializacao" required>

        <br>

        <label for="tempoespecializacao">Tempo da Especialização</label>
        <input type="number" name="tempoespecializacao" id="tempoespecializacao" required>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
