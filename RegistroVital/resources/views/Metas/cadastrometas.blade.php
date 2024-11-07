@extends($layout)

@section('titulo', 'Cadastrar nova meta')

@section('conteudo')
    <div class="container">
        <h1>Criar Meta</h1>
        <form action="{{ route('metas.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="titulo_meta">Título:</label>
                <input type="text" name="titulo_meta" required class="form-control">
            </div>

            <div class="form-group">
                <label for="descricao_meta">Descrição:</label>
                <textarea name="descricao_meta" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="tipo_meta_id">Tipo de Meta:</label>
                <select name="tipo_meta_id" required class="form-control">
                    @foreach($tiposMetas as $tipo)
                        <option value="{{ $tipo->id }}">{{ $tipo->descricao }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="data_inicio">Data de Início:</label>
                <input type="date" name="data_inicio" id="data_inicio" required class="form-control"
                       min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
            </div>

            <div class="form-group">
                <label for="data_fim">Data de Fim:</label>
                <input type="date" name="data_fim" id="data_fim" class="form-control">
                <div class="form-check">
                    <input type="checkbox" id="indefinido" name="indefinido" class="form-check-input" value="1">
                    <label for="indefinido" class="form-check-label">Indefinido</label>
                </div>
            </div>

            <div class="form-group">
                <label for="unidade_metrica">Unidade Métrica:</label>
                <input type="text" name="unidade_metrica" required class="form-control" placeholder="Ex: kg, cm">
            </div>

            <div class="form-group">
                <label for="quantidade_alvo">Quantidade Alvo:</label>
                <input type="number" name="quantidade_alvo" required class="form-control" placeholder="Ex: 10">
            </div>

            <button type="submit" class="btn btn-primary">Criar Meta</button>
        </form>
    </div>

    <script>
        document.getElementById('indefinido').addEventListener('change', function () {
            const dataFimInput = document.getElementById('data_fim');
            if (this.checked) {
                dataFimInput.value = '';
                dataFimInput.disabled = true;
            } else {
                dataFimInput.disabled = false;
            }
        });

        document.getElementById('data_inicio').addEventListener('change', function () {
            const dataInicio = new Date(this.value);
            const dataFimInput = document.getElementById('data_fim');
            const maxDate = new Date(dataInicio);
            maxDate.setFullYear(dataInicio.getFullYear() + 3);

            // Define os limites da data de fim
            dataFimInput.min = new Date(dataInicio.setDate(dataInicio.getDate() + 1)).toISOString().split('T')[0];
            dataFimInput.max = maxDate.toISOString().split('T')[0];

            if (dataFimInput.value) {
                if (new Date(dataFimInput.value) < new Date(dataFimInput.min)) {
                    dataFimInput.value = '';
                }
            }
        });
    </script>
@endsection
