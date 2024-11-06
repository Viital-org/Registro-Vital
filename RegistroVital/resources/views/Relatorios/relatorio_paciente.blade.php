@extends($layout)

@section('titulo', 'Seus Relatórios')

@section('conteudo')

    <div class="row">
        <div class="col">
            <h2 class="text-center">Relatório de Anotações</h2>
            <canvas id="graficoAnotacoes"></canvas>
        </div>

        <div class="col">
            <h2 class="text-center mt-5">Relatório de Metas</h2>
            <canvas id="graficoMetas"></canvas>
        </div>

        <button id="downloadButtonAnotacoes" class="btn btn-primary mt-3">Baixar Gráfico de Anotações</button>
        <button id="downloadButtonMetas" class="btn btn-primary mt-3">Baixar Gráfico de Metas</button>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            // Gráfico de Anotações
            const ctxAnotacoes = document.getElementById('graficoAnotacoes').getContext('2d');
            const dataAnotacoes = {
                labels: [
                    @foreach($anotacoes as $anotacao)
                        "{{ $anotacao->descricao_tipo }}",
                    @endforeach
                ],
                datasets: [{
                    label: 'Quantidade de Anotações',
                    data: [
                        @foreach($anotacoes as $anotacao)
                            {{ $anotacao->total }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            };

            const configAnotacoes = {
                type: 'bar',
                data: dataAnotacoes,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const graficoAnotacoes = new Chart(ctxAnotacoes, configAnotacoes);

            document.getElementById('downloadButtonAnotacoes').addEventListener('click', function () {
                const link = document.createElement('a');
                link.href = graficoAnotacoes.toBase64Image();
                link.download = 'grafico-anotacoes.png';
                link.click();
            });

            // Gráfico de Metas
            const ctxMetas = document.getElementById('graficoMetas').getContext('2d');
            const dataMetas = {
                labels: ['Pendente', 'Iniciada', 'Concluída'],
                datasets: [{
                    label: 'Quantidade de Metas',
                    data: [
                        @foreach($metas as $meta)
                            {{ $meta->situacao == 0 ? $meta->total : 0 }},
                        {{ $meta->situacao == 1 ? $meta->total : 0 }},
                        {{ $meta->situacao == 2 ? $meta->total : 0 }},
                        @endforeach
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            };

            const configMetas = {
                type: 'pie',
                data: dataMetas,
                options: {
                    responsive: true,
                }
            };

            const graficoMetas = new Chart(ctxMetas, configMetas);

            document.getElementById('downloadButtonMetas').addEventListener('click', function () {
                const link = document.createElement('a');
                link.href = graficoMetas.toBase64Image();
                link.download = 'grafico-metas.png';
                link.click();
            });
        </script>

        <h3 class="mt-5">Total de Anotações: {{ $totalAnotacoes }}</h3>
        <ul class="list-group">
            @foreach($anotacoes as $anotacao)
                <li class="list-group-item">
                    <strong>{{ $anotacao->descricao_tipo }}:</strong>
                    {{ $anotacao->total }} anotações ({{ $anotacao->percentual }}%)
                </li>
            @endforeach
        </ul>

        <h3 class="mt-5">Total de Metas: {{ $totalMetas }}</h3>
        <ul class="list-group">
            <li class="list-group-item">
                <strong>Pendente:</strong> {{ $metas->where('situacao', 0)->sum('total') }}
            </li>
            <li class="list-group-item">
                <strong>Iniciada:</strong> {{ $metas->where('situacao', 1)->sum('total') }}
            </li>
            <li class="list-group-item">
                <strong>Concluída:</strong> {{ $metas->where('situacao', 2)->sum('total') }}
            </li>
        </ul>
    </div>

@endsection
