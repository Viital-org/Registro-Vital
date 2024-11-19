@extends($layout)

@section('titulo', 'Relatórios de Administração')

@section('conteudo')

    <div class="container mt-5">
        <h2 class="text-center">Relatórios de Administração</h2>

        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Número de Usuários</h4>
                        <button id="downloadButtonNumeroUsuarios" class="btn btn-primary">Exportar</button>
                    </div>
                    <div class="card-body">
                        <div class="chart-area pt-4 pb-2">
                            <canvas id="graficoUsuarios"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5">
                <div class="card shadow mb-4 grafico-2-admin">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Número de anotações</h4>
                        <button id="downloadButtonMetas" class="btn btn-primary">Exportar</button>
                    </div>
                    <div class="card-body">
                        <div class="chart-pie pt-4 pb-2">
                            <canvas id="graficoTopUsuarios"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h4 class="m-0 font-weight-bold text-primary">Quantidades de anotações de cada tipo</h4>
                        <button id="downloadButtonAnotacoes" class="btn btn-primary">Exportar</button>
                    </div>
                    <div class="card-body">
                        <div class="chart-area pt-4 pb-2">
                            <canvas id="graficoTiposAnotacoes"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>

        const ctxUsuarios = document.getElementById('graficoUsuarios').getContext('2d');
        const dataUsuarios = {
            labels: ['Pacientes', 'Profissionais'],
            datasets: [{
                label: 'Número de Usuários',
                data: [
                    @foreach($usuariosPorTipo as $usuario)
                        {{ $usuario->total }},
                    @endforeach
                ],
                backgroundColor: ['rgba(75, 192, 192, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(75, 192, 192, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        };
        const graficoUsuarios = new Chart(ctxUsuarios, {
            type: 'bar',
            data: dataUsuarios,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxTopUsuarios = document.getElementById('graficoTopUsuarios').getContext('2d');
        const dataTopUsuarios = {
            labels: [
                @foreach($topUsuariosAnotacoes as $anotacao)
                    '{{ $anotacao->nome_completo }}',
                @endforeach
            ],
            datasets: [{
                label: 'Número de Anotações',
                data: [
                    @foreach($topUsuariosAnotacoes as $anotacao)
                        {{ $anotacao->total }},
                    @endforeach
                ],
                backgroundColor: ['rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(54, 162, 235, 0.2)'],
                borderColor: ['rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 206, 86, 1)', 'rgba(54, 162, 235, 1)'],
                borderWidth: 1
            }]
        };

        const graficoTopUsuarios = new Chart(ctxTopUsuarios, {
            type: 'bar',
            data: dataTopUsuarios,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        const ctxTiposAnotacoes = document.getElementById('graficoTiposAnotacoes').getContext('2d');
        const dataTiposAnotacoes = {
            labels: [
                @foreach($tiposAnotacoesFrequentes as $anotacao)
                    "{{ $anotacao->descricao_tipo }}",
                @endforeach
            ],
            datasets: [{
                label: 'Quantidade de Anotações',
                data: [
                    @foreach($tiposAnotacoesFrequentes as $anotacao)
                        {{ $anotacao->total }},
                    @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)'
                ],
                borderWidth: 1
            }]
        };
        const graficoTiposAnotacoes = new Chart(ctxTiposAnotacoes, {
            type: 'bar',
            data: dataTiposAnotacoes,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        document.getElementById('graficoUsuariosButton').addEventListener('click', function () {
            document.getElementById('graficoUsuarios').style.display = 'block';
            document.getElementById('graficoTopUsuarios').style.display = 'none';
            document.getElementById('graficoTiposAnotacoes').style.display = 'none';
        });

        document.getElementById('graficoTopUsuariosButton').addEventListener('click', function () {
            document.getElementById('graficoUsuarios').style.display = 'none';
            document.getElementById('graficoTopUsuarios').style.display = 'block';
            document.getElementById('graficoTiposAnotacoes').style.display = 'none';
        });

        document.getElementById('graficoTiposAnotacoesButton').addEventListener('click', function () {
            document.getElementById('graficoUsuarios').style.display = 'none';
            document.getElementById('graficoTopUsuarios').style.display = 'none';
            document.getElementById('graficoTiposAnotacoes').style.display = 'block';
        });

        document.getElementById('downloadPNG').addEventListener('click', function () {
            const canvas = document.getElementById('graficoUsuarios').style.display === 'block' ?
                document.getElementById('graficoUsuarios') :
                document.getElementById('graficoTopUsuarios').style.display === 'block' ?
                    document.getElementById('graficoTopUsuarios') : document.getElementById('graficoTiposAnotacoes');
            const image = canvas.toDataURL('image/png');
            const link = document.createElement('a');
            link.href = image;
            link.download = 'grafico.png';
            link.click();
        });

        document.getElementById('downloadButtonAnotacoes').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficoAnotacoes.toBase64Image();
            link.download = 'grafico-anotacoes.png';
            link.click();
        });

        document.getElementById('downloadButtonNumeroUsuarios').addEventListener('click', function () {
            const link = document.createElement('a');
            link.href = graficoMetas.toBase64Image();
            link.download = 'grafico-numero-usuarios.png';
            link.click();
        });

        document.getElementById('downloadPDF').addEventListener('click', function () {
            const {jsPDF} = window.jspdf;
            const doc = new jsPDF();

            const canvas = document.getElementById('graficoUsuarios').style.display === 'block' ?
                document.getElementById('graficoUsuarios') :
                document.getElementById('graficoTopUsuarios').style.display === 'block' ?
                    document.getElementById('graficoTopUsuarios') : document.getElementById('graficoTiposAnotacoes');

            const image = canvas.toDataURL('image/png');
            doc.addImage(image, 'PNG', 10, 10, 180, 100);
            doc.save('grafico.pdf');
        });

    </script>

@endsection
