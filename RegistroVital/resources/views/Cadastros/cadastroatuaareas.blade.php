@extends($layout)

@section('titulo', 'Cadastro de Áreas de Atuação')

@section('conteudo')
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i
                        class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Cadastrar Área de Atuação</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{ route('atuaareas-store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="area" class="form-label">Área</label>
                            <input type="text" name="descricao_area" id="descricao_area" class="form-control" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" name="observacao" id="observacao" class="form-control" required>
                        </div> -->

                        <div class="d-grid">
                            <button class="btn btn-primary btn-lg" id="submitButton" type="submit">Enviar</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
