@extends ('layoutspadrao.profissionais')

@section ('titulo', 'Cadastro de Metas')

@section ('conteudo')

    <form action="{{route('metas-store') }}" method="POST">
        @csrf

        <a href="{{ route('welcome') }}">Home</a>

        <br>

        <a href="{{ route('metas-index') }} ">Listar metas</a>

        <br>

        <h1>Cadastro de Metas</h1>

        <br>

        <label for="meta">Meta</label>
        <input type="text" name="meta" id="meta" required>

        <br>

        <label for="data_inicio">Data de Início:</label>
        <input type="date" name="data_inicio" id="data_inicio" value="<?php echo date('Y-m-d'); ?>" readonly required>

        <br>

        <label for="data_fim">Data de Fim:</label>
        <input type="date" name="data_fim" id="data_fim" min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
               required>


        <br>

        <label for="descricao">Descrição</label>
        <input type="text" name="descricao" id="descricao" required>

        <br>

        <input type="submit" value="Enviar">

    </form>

@endsection
