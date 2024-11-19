@extends($layout)

@section('titulo', 'Cadastro de Tipos de Anotação')

@section('conteudo')
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                        class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Cadastrar Tipo de Anotação</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{ route('tipoanotacao.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="desc_anotacao" class="form-label">Descrição do tipo de anotação</label>
                            <input type="text" name="descricao_tipo" id="descricao_tipo" class="form-control" required>
                        </div>

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Cadastrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
