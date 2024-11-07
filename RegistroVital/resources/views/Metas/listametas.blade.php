@extends($layout)

@section('titulo', 'Listar metas')

@section('conteudo')
    <div class="container">
        <h1>Suas Metas</h1>
        <a href="{{ route('metas.create') }}" class="btn btn-primary mb-3">Cadastrar Nova Meta</a>

        {{-- Metas Pendentes --}}
        <h2 class="mt-5">Metas Pendentes</h2>
        @forelse ($metasPendentes as $meta)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $meta->titulo_meta }}</h5>
                    <p class="card-text">{{ $meta->descricao_meta }}</p>
                    <p><strong>Progresso Atual:</strong> {{ $meta->progresso_atual }} / {{ $meta->quantidade_alvo }} {{ $meta->unidade_metrica }}</p>
                    <p><strong>Sequência Atual:</strong> {{ $meta->sequencia_atual }}</p>
                    <p><strong>Maior Sequência:</strong> {{ $meta->maior_sequencia }}</p>

                    @php
                        $progresso = $meta->calcularProgresso();
                        $descricaoProgresso = $meta->progresso_atual >= $meta->quantidade_alvo
                            ? 'Meta diária concluída'
                            : 'Progresso diário ' . $progresso . '%';
                    @endphp

                    <p><strong>{{ $descricaoProgresso }}</strong></p>
                    <p><strong>Tempo Restante da Meta:</strong> {{ $meta->calcularTempoRestante() }}</p>

                    <div class="d-flex justify-content-between">
                        <form action="{{ route('metas.start', $meta) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-info">Iniciar Meta</button>
                        </form>

                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir esta meta?');">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Não há metas pendentes no momento.</p>
        @endforelse

        {{-- Metas Iniciadas --}}
        <h2 class="mt-5">Metas Iniciadas</h2>
        @forelse ($metasIniciadas as $meta)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $meta->titulo_meta }}</h5>
                    <p class="card-text">{{ $meta->descricao_meta }}</p>
                    <p><strong>Progresso Atual:</strong> {{ $meta->progresso_atual }} / {{ $meta->quantidade_alvo }} {{ $meta->unidade_metrica }}</p>
                    <p><strong>Sequência Atual:</strong> {{ $meta->sequencia_atual }}</p>
                    <p><strong>Maior Sequência:</strong> {{ $meta->maior_sequencia }}</p>

                    @php
                        $progresso = $meta->calcularProgresso();
                        $descricaoProgresso = $meta->progresso_atual >= $meta->quantidade_alvo
                            ? 'Meta diária concluída'
                            : 'Progresso diário ' . $progresso . '%';
                    @endphp

                    <p><strong>{{ $descricaoProgresso }}</strong></p>
                    <p><strong>Tempo Restante da Meta:</strong> {{ $meta->calcularTempoRestante() }}</p>

                    <div class="d-flex justify-content-between">
                        {{-- Condição para exibir o botão de incremento --}}
                        @if ($meta->progresso_atual < $meta->quantidade_alvo)
                            <form action="{{ route('metas.increment', $meta) }}" method="POST" class="d-inline">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-info">Incrementar Progresso</button>
                            </form>
                        @else
                            <button class="btn btn-secondary" disabled>Incrementar Progresso</button>
                        @endif

                        <form action="{{ route('metas.complete', $meta) }}" method="POST" class="d-inline">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Marcar como Concluída</button>
                        </form>

                        <a href="{{ route('metas.edit', $meta->id) }}" class="btn btn-warning">Editar</a>

                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir esta meta?');">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Não há metas iniciadas no momento.</p>
        @endforelse

        {{-- Metas Concluídas --}}
        <h2 class="mt-5">Metas Concluídas</h2>
        @forelse ($metasConcluidas as $meta)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $meta->titulo_meta }}</h5>
                    <p class="card-text">{{ $meta->descricao_meta }}</p>
                    <p><strong>Meta concluída em:</strong> {{ $meta->data_fim ?? 'Data de conclusão não registrada' }}</p>

                    <div class="d-flex justify-content-between">
                        <a href="{{ route('metas.show', $meta->id) }}" class="btn btn-primary">Ver Detalhes</a>
                        <form action="{{ route('metas.destroy', $meta->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Deseja realmente excluir esta meta?');">Excluir</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p>Não há metas concluídas no momento.</p>
        @endforelse
    </div>
@endsection
