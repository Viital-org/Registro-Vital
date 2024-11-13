@extends($layout)

@section('titulo', 'Seus Relatórios')

@section('conteudo')


<!-- Begin Page Content -->
<div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total de metas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalMetas }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total de anotações</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalAnotacoes }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                            </div>
                            <div class="col">
                                <div class="progress progress-sm mr-2">
                                    <div class="progress-bar bg-info" role="progressbar"
                                        style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                        aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Requests</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div class="row">
        <div class="graficoAnotacoes">
            <h3 class="text-center">Relatório de Anotações</h3>
            <canvas id="graficoAnotacoes"></canvas>
        </div>

        <div class="graficoMetas">
            <h2 class="text-center">Relatório de Metas</h2>
            <canvas id="graficoMetas"></canvas>
        </div>

        <button id="downloadButtonAnotacoes" class="btn btn-primary">Baixar Gráfico de Anotações</button>
        <button id="downloadButtonMetas" class="btn btn-primary">Baixar Gráfico de Metas</button>

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
