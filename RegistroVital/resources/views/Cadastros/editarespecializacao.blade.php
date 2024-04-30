<div>
    @extends('LayoutsPadrao.profissionais')

    @section('titulo', 'Editar Informações de Especialização')

    @section ('conteudo')

        <form action="{{ route('especializacoes-update', ['id' => $especializacao->id]) }}" method="POST">

            @csrf

            @method('PUT')

            <h1>Editar Dados da Especialização</h1>

            <br>

            <label for="especializacao">Especialização</label>
            <input type="text" name="especializacao" id="especializacao" value="{{ $especializacao->especializacao }}" required>

            <br>

            <label for="tempoespecializacao">Tempo da Especialização</label>
            <input type="number" name="tempoespecializacao" id="tempoespecializacao" value="{{ $especializacao->tempoespecializacao }}" required>

            <br>

            <label for="descricao">Descrição</label>
            <input type="text" name="descricao" id="descricao" value="{{ $especializacao->descricao }}" required>

            <br>

            <button type="submit">Salvar Alterações</button>

        </form>

    @endsection</div>
