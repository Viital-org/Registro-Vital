@extends($layout)

@section('titulo', 'Seus Relatórios')

@section('conteudo')

    <div class="container d-flex flex-column justify-content-center align-items-center min-vh-100">

        <div class="container-fluid">

            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="titulo-pagina h1 mb-0 text-gray-800 fw-bolder">Dashboard</h1>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                        class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
            </div>

            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-right-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Metas Concluídas
                                    </div>
                                    <div
                                        class="h5 mb-0 font-weight-bold text-gray-800">{{ $metas->where('situacao', 2)->sum('total') }}</div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('/img/meta.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total de anotações
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAnotacoes }}</div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('/img/nota.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Consultas
                                        Realizadas
                                    </div>
                                    <div class="row no-gutters align-items-center">
                                        <div class="col-auto">
                                            <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">6</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('/img/consultando.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Pontos arrecadados
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                </div>
                                <div class="col-auto">
                                    <img src="{{ asset('/img/estrela.png') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row w-100">
                <div class="col-xl-4 col-lg-5 d-flex">
                    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Anotações</h6>
                            <button id="downloadButtonAnotacoes" class="btn btn-primary">Exportar</button>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="chart-area pt-4 pb-2 flex-grow-1">
                                <canvas id="graficoAnotacoes"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-5 d-flex">
                    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary">Metas</h6>
                            <button id="downloadButtonMetas" class="btn btn-primary">Exportar</button>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <div class="chart-pie pt-4 pb-2 flex-grow-1">
                                <canvas id="graficoMetas"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                    }]
                };

                const configAnotacoes = {
                    type: 'pie',
                    data: dataAnotacoes,
                    options: {
                        responsive: true, // Makes the chart responsive to container size
                        maintainAspectRatio: true,
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
                    type: 'bar',
                    data: dataMetas,
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
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

            <div class="row w-100 mb-4">
                <div class="col-xl-6 col-lg-6 d-flex">
                    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">
                                Total de Anotações: {{ $totalAnotacoes }}
                            </h4>
                        </div>
                        <div class="card-body d-flex flex-column">
                            @foreach($anotacoes as $anotacao)
                                <li class="list-group-item">
                                    <strong>{{ $anotacao->descricao_tipo }}:</strong>
                                    {{ $anotacao->total }} anotações ({{ $anotacao->percentual }}%)
                                </li>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-6 d-flex">
                    <div class="card shadow mb-4 w-100">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold text-primary">
                                Total de Metas: {{ $totalMetas }}
                            </h4>
                        </div>
                        <div class="card-body d-flex flex-column">
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
                    </div>
                </div>
            </div>

@endsection
