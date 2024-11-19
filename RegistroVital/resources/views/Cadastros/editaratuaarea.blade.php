@extends($layout)

@section('titulo', 'Editar Informações de Área de Atuação')

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
                    <form action="{{ route('atuaareas-update', ['id' => $atuaarea->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <h1>Editar Área de Atuação</h1>

                        <div class="mb-3">
                            <label for="area" class="form-label">Área</label>
                            <input type="text" name="descricao_area" id="descricao_area" class="form-control"
                                   value="{{ $atuaarea->descricao_area }}" required>
                        </div>

                        <!-- <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição</label>
                            <input type="text" name="descricao" id="descricao" class="form-control" value="{{ $atuaarea->descricao }}"
                                 required>
                        </div> -->

                        <div class="d-grid">
                            <button class="btn btn-primary btn-md" id="submitButton" type="submit">Salvar Alterações
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

