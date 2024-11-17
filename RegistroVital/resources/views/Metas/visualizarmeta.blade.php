@extends($layout)

@section('titulo', 'Detalhes de Meta Concluída')

@section('conteudo')
    <div class="container">
        <h1>Detalhes da Meta: {{ $meta->titulo_meta }}</h1>

        <div class="card mt-3">
            <div class="card-body">
                <h5 class="card-title">Descrição</h5>
                <p class="card-text">{{ $meta->descricao_meta }}</p>

                <h5 class="card-title">Período da Meta</h5>
                <p class="card-text">
                    Início: {{ $periodo['inicio'] }}<br>
                    Fim: {{ $periodo['fim']  }}
                </p>

                <h5 class="card-title">Maior Sequência Atingida</h5>
                <p class="card-text">{{ $maiorSequencia }}</p>

                <h5 class="card-title">Tipo de Meta</h5>
                <p class="card-text">{{ $tipoMeta->descricao }}</p>

            </div>
        </div>

        <a href="{{ route('metas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
    </div>
@endsection
