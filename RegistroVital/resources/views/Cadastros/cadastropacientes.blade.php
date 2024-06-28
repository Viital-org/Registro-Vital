@extends($layout)

@section('titulo', 'Cadastro de Pacientes')

@section('conteudo')

    <form action="{{ route('pacientes-store') }}" method="POST">
        @csrf

        <h1>Cadastro de Paciente</h1>

        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="datanascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="datanascimento" id="datanascimento" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" name="endereco" id="endereco" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="numcartaocred" class="form-label">Cartão de Crédito</label>
            <input type="text" name="numcartaocred" id="numcartaocred" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="hobbies" class="form-label">Hobbies</label>
            <input type="text" name="hobbies" id="hobbies" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="doencascronicas" class="form-label">Lista de Doenças Crônicas</label>
            <input type="text" name="doencascronicas" id="doencascronicas" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="remediosregulares" class="form-label">Lista de Remédios Regulares</label>
            <input type="text" name="remediosregulares" id="remediosregulares" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>

    </form>

@endsection
