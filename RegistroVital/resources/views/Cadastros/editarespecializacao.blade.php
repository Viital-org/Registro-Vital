<div>
    @extends('LayoutsPadrao.profissionais')

    @section('titulo', 'Editar Informações de Especialização')

    @section ('conteudo')

        <form action="{{ route('especializacoes-update', ['id' => $especializacoes->id]) }}" method="POST">

            @csrf

            <a href="{{ route('welcome') }}">Home</a>

            <br>

            <a href="{{ route('especializacoes-index') }} ">Listar Especialização</a>

            <br>

            <a href="{{ route('cadastroespecializacoes.create') }} ">Cadastrar Especialização</a>

            @method('PUT')



            <h1>Editar Dados da Especialização</h1>

            <br>

            <label for="especializacao">Especialização</label>
            <input type="text" name="especializacao" id="especializacao" value="{{ $especializacoes->especializacao }}"
                   required>

            <br>

            <label for="tempoespecializacao">Tempo da Especialização</label>
            <input type="number" name="tempoespecializacao" id="tempoespecializacao"
                   value="{{ $especializacoes->tempoespecializacao }}" required>

            <br>

            <label for="area_id">Area de Atuação:</label>
            <select name="area_id" id="area_id">
                @foreach($atuaareas as $atuaarea)
                    <option value="{{ $atuaarea->id }}"
                            @if ($atuaarea->id === $especializacoes->area_id) selected @endif>{{ $atuaarea->area }}</option>
                @endforeach
            </select>

            <br>

            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" value="{{ $especializacoes->descricao }}" required>

            <br>

            <button type="submit">Salvar Alterações</button>

        </form>

    @endsection</div>
