@extends('LayoutsPadrao.profissionais')

@section('titulo', 'Cadastro de Especializações')

@section ('conteudo')

    <form action="{{route('especializacoes-store')}}" method="POST">

        @csrf

        <a href="{{ route('welcome') }}" class="btn btn-outline-primary">Home</a>

        &nbsp;

        <a href="{{ route('especializacoes-index') }} " class="btn btn-outline-info">Listar Especializações</a>

        <br>

        <h1>Cadastro de Especialização</h1>

        <br>

        <label for="especializacao">Especialização</label>
        <input type="text" name="especializacao" id="especializacao" required>

        <br>

        <label for="tempoespecializacao">Tempo da Especialização</label>
        <input type="number" name="tempoespecializacao" id="tempoespecializacao" required>

        <br>

        <label for="area_id">Area de Atuação:</label>
        <select name="area_id" id="area_id" required>
            @foreach($atuaareas as $atuaarea)
                <option value="{{ $atuaarea->id }}">{{ $atuaarea->area }}</option>
            @endforeach
        </select>

        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
