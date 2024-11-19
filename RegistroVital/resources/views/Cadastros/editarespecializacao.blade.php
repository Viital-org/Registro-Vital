@extends($layout)

@section('titulo', 'Editar Informações de Especialização')

@section('conteudo')
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-4 py-5 px-4 px-md-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient-primary-to-secondary text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Editar Especializacao</h1>
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">
                    <form action="{{ route('especializacoes-update', ['id' => $especializacoes->id]) }}" method="POST">
                        @csrf
                        @method('PUT')


                        <div class="mb-3">
                            <label for="area_id" class="form-label">Área de Atuação:</label>
                            <select name="area_atuacao_id" id="area_atuacao_id" class="form-select">
                                @foreach($atuaareas as $atuaarea)
                                    <option value="{{ $atuaarea->id }}"
                                            @if ($atuaarea->id === $especializacoes->area_id) selected @endif>{{ $atuaarea->descricao_area }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="especializacao" class="form-label">Especialização</label>
                            <input type="text" name="descricao_especializacao" id="descricao_especializacao" class="form-control"
                                   value="{{ $especializacoes->descricao_especializacao }}" required>
                        </div>

                        <div class="d-grid"><button class="btn btn-primary btn-md" id="submitButton" type="submit">Salvar Alterações</button></div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
