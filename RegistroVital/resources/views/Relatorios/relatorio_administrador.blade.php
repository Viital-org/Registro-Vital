@extends($layout)

@section('titulo', 'Relatórios de Administração')

@section('conteudo')

    <div class="container mt-5">
        <h2 class="text-center">Relatórios de Administração</h2>

        <div class="row">
            <div class="col-md-2">
                <button id="graficoUsuariosButton" class="btn btn-secondary mb-3">Total de Usuários</button>
                <button id="graficoTopUsuariosButton" class="btn btn-secondary mb-3">Top 5 Usuários com mais Anotações
                </button>
                <button id="graficoTiposAnotacoesButton" class="btn btn-secondary">Tipos de Anotações</button>
            </div>

            <div class="col-md-10">
                <canvas id="graficoUsuarios" width="400" height="200"></canvas>
                <canvas id="graficoTopUsuarios" width="400" height="200" style="display: none;"></canvas>
                <canvas id="graficoTiposAnotacoes" width="400" height="200" style="display: none;"></canvas>

                <div class="mt-3">
                    <button id="downloadPNG" class="btn btn-primary">Baixar Gráfico (PNG)</button>
                    <button id="downloadPDF" class="btn btn-danger">Baixar Gráfico (PDF)</button>
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
