@extends($layout)

@section('titulo', 'Listar Metas')

@section('conteudo')
    <div class="container">
        <h1 class="my-4 text-center">Suas Metas</h1>
        <a href="{{ route('metas.create') }}" class="btn btn-primary mb-4"><i class="bi bi-plus-circle"></i> Cadastrar Nova Meta</a>

        {{-- Metas Pendentes --}}
        <h2 class="mt-5 mb-3 text-muted">Metas Pendentes</h2>
        @forelse ($metasPendentes as $meta)
            <div class="card mb-3 shadow-sm border-info">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $meta->titulo_meta }}</h5>
                    <p class="card-text text-muted">{{ $meta->descricao_meta }}</p>
                    <p><strong>Progresso Atual:</strong> {{ $meta->progresso_atual }} / {{ $meta->quantidade_alvo }} {{ $meta->unidade_metrica }}</p>
                    <p><strong>Sequência Atual:</strong> {{ $meta->sequencia_atual }}</p>
                    <p><strong>Maior Sequência:</strong> {{ $meta->maior_sequencia }}</p>

                    @php
                        $progresso = $meta->calcularProgresso();
                        $descricaoProgresso = $meta->progresso_atual >= $meta->quantidade_alvo
                            ? 'Meta diária concluída'
                            : 'Progresso diário ' . $progresso . '%';
                    @endphp

                    <p class="font-weight-bold text-success">{{ $descricaoProgresso }}</p>
                    <p><strong>Tempo Restante da Meta:</strong> {{ $meta->calcularTempoRestante() }}</p>

                    <div class="d-flex justify-content-between mt-3">
                        <form action="{{ route('metas.start', $meta) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info btn-sm"><i class="bi bi-play-circle"></i> Iniciar Meta</button>
                        </form>

                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>

                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta meta?');">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Não há metas pendentes no momento.</p>
        @endforelse

        {{-- Metas Iniciadas --}}
        <h2 class="mt-5 mb-3 text-muted">Metas Iniciadas</h2>
        @forelse ($metasIniciadas as $meta)
            <div class="card mb-3 shadow-sm border-warning">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $meta->titulo_meta }}</h5>
                    <p class="card-text text-muted">{{ $meta->descricao_meta }}</p>
                    <p><strong>Progresso Atual:</strong> {{ $meta->progresso_atual }} / {{ $meta->quantidade_alvo }} {{ $meta->unidade_metrica }}</p>
                    <p><strong>Sequência Atual:</strong> {{ $meta->sequencia_atual }}</p>
                    <p><strong>Maior Sequência:</strong> {{ $meta->maior_sequencia }}</p>

                    @php
                        $progresso = $meta->calcularProgresso();
                        $descricaoProgresso = $meta->progresso_atual >= $meta->quantidade_alvo
                            ? 'Meta diária concluída'
                            : 'Progresso diário ' . $progresso . '%';
                    @endphp

                    <p class="font-weight-bold text-warning">{{ $descricaoProgresso }}</p>
                    <p><strong>Tempo Restante da Meta:</strong> {{ $meta->calcularTempoRestante() }}</p>

                    <div class="d-flex justify-content-between mt-3">
                        @if ($meta->progresso_atual < $meta->quantidade_alvo)
                            <form action="{{ route('metas.increment', $meta) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info btn-sm"><i class="bi bi-arrow-up-circle"></i> Incrementar Progresso</button>
                            </form>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled><i class="bi bi-arrow-up-circle"></i> Incrementar Progresso</button>
                        @endif

                        <form action="{{ route('metas.complete', $meta) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-check-circle"></i> Marcar como Concluída</button>
                        </form>

                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i> Editar</a>

                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta meta?');">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Não há metas iniciadas no momento.</p>
        @endforelse

        {{-- Metas Concluídas --}}
        <h2 class="mt-5 mb-3 text-muted">Metas Concluídas</h2>
        @forelse ($metasConcluidas as $meta)
            <div class="card mb-3 shadow-sm border-success">
                <div class="card-body">
                    <h5 class="card-title font-weight-bold">{{ $meta->titulo_meta }}</h5>
                    <p class="card-text text-muted">{{ $meta->descricao_meta }}</p>
                    <p><strong>Meta concluída em:</strong>
                        @if($meta->data_fim)
                            {{ date('d/m/Y', strtotime($meta->data_fim)) }}
                        @else
                            Data de conclusão não registrada
                        @endif
                    </p>


                    <div class="d-flex justify-content-between mt-3">
                        <a href="{{ route('metas.show', $meta->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i> Ver Detalhes</a>
                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente excluir esta meta?');">
                                <i class="bi bi-trash"></i> Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-muted">Não há metas concluídas no momento.</p>
        @endforelse
    </div>
@endsection
