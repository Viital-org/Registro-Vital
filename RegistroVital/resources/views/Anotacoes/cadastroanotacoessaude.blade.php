@extends($layout)

@section('titulo', 'Cadastrar nova anotação')

@section('conteudo')

    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-header text-center bg-primary text-white">
                <h2>Cadastro de Nova Anotação</h2>
            </div>
            <div class="card-body">
                <form action="{{ route('anotacoessaude-store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="tipo_anot" class="form-label">Tipo de Anotação</label>
                        <select name="tipo_anot" id="tipo_anot" class="form-select" required>
                            <option value="" disabled selected>Selecione o tipo</option>
                            @foreach ($tipoanotacoes as $tipoanotacao)
                                <option value="{{ $tipoanotacao->id }}">{{ $tipoanotacao->descricao_tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="anotacao" class="form-label">Anotação</label>
                        <textarea name="anotacao" id="anotacao" class="form-control" rows="5"
                                  placeholder="Escreva sua anotação..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label for="data_anotacao" class="form-label">Data da Anotação</label>
                        <input type="date" name="data_anotacao" id="data_anotacao" class="form-control"
                               max="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-4">
                        <label for="visibilidade" class="form-label">Visibilidade</label>
                        <select name="visibilidade" id="visibilidade" class="form-select" required>
                            <option value="1">Deixar Anotação Pública</option>
                            <option value="2">Deixar Anotação Privada</option>
                        </select>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', (event) => {
            const dataAnotacao = document.getElementById('data_anotacao');
            const today = new Date().toISOString().split('T')[0];
            dataAnotacao.value = today;
        });
    </script>

@endsection
