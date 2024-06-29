@extends($layout)

@section('titulo', 'Editar Informações de Paciente')

@section('conteudo')

    <form action="{{ route('pacientes-update', ['id' => $paciente->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <h1>Editar Dados do Paciente</h1>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" value="{{ $paciente->nome }}" required>
        </div>

        <div class="mb-3">
            <label for="datanascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="datanascimento" id="datanascimento" class="form-control"
                   value="{{ $paciente->datanascimento }}" required>
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" value="{{ $paciente->cep }}" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="{{ $paciente->endereco }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="numcartaocred" class="form-label">Cartão de Crédito</label>
            <input type="text" name="numcartaocred" id="numcartaocred" class="form-control"
                   value="{{ $paciente->numcartaocred }}" required>
        </div>

        <div class="mb-3">
            <label for="hobbies" class="form-label">Hobbies</label>
            <input type="text" name="hobbies" id="hobbies" class="form-control" value="{{ $paciente->hobbies }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="doencascronicas" class="form-label">Lista de Doenças Cronicas</label>
            <input type="text" name="doencascronicas" id="doencascronicas" class="form-control"
                   value="{{ $paciente->doencascronicas }}" required>
        </div>

        <div class="mb-3">
            <label for="remediosregulares" class="form-label">Lista de Remédios Regulares</label>
            <input type="text" name="remediosregulares" id="remediosregulares" class="form-control"
                   value="{{ $paciente->remediosregulares }}" required>
        </div>

        <div class="mb-3">
            <label for="meta_id" class="form-label">Meta</label>
            <select name="meta_id" id="meta_id" class="form-select">
                <option value="">Não definido</option>
                @foreach($metas as $meta)
                    <option value="{{$meta->id}}"
                            @if ($meta->id == $paciente->meta_id) selected @endif>{{ $meta->meta }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
    </form>

@endsection
