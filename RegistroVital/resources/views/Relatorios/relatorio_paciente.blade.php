@extends($layout)

@section('titulo', 'Seus Relatórios')

@section('conteudo')

    <div class="container mt-5">
        <h2 class="text-center">Relatório de Anotações</h2>

        <canvas id="graficoAnotacoes" width="400" height="200"></canvas>

        <button id="downloadButton" class="btn btn-primary mt-3">Baixar Gráfico</button>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('graficoAnotacoes').getContext('2d');

            const data = {
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

            const config = {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            const graficoAnotacoes = new Chart(ctx, config);

            document.getElementById('downloadButton').addEventListener('click', function () {
                const link = document.createElement('a');
                link.href = graficoAnotacoes.toBase64Image();
                link.download = 'grafico-anotacoes.png';
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
    </div>

@endsection
