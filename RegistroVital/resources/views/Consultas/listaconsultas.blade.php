@extends($layout)

@section('titulo', 'Minhas Consultas')

@section('conteudo')
    <div class="container my-4">
        <h1 class="mb-4 text-center">Minhas Consultas</h1>
        <div class="table-responsive rounded-3">
            <table class="table table-hover table-striped align-middle">
                <thead class="thead-dark">
                <tr>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Área Médica</th>
                    <th class="text-center">Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($consultas as $consulta)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($consulta->agendamento->data_agendamento)->format('d/m/Y H:i') }}</td>
                        <td>
                            <span class="badge
                                @switch($consulta->situacao)
                                    @case(0) badge-warning @break
                                    @case(1) badge-primary @break
                                    @case(2) badge-success @break
                                    @default badge-danger
                                @endswitch">
                                @switch($consulta->situacao)
                                    @case(0) Pendente @break
                                    @case(1) Confirmada @break
                                    @case(2) Finalizada @break
                                    @default Cancelada
                                @endswitch
                            </span>
                        </td>
                        <td>{{ $consulta->agendamento->especializacao->area->descricao_area ?? 'N/A' }}</td>
                        <td class="text-center">
                            <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-sm btn-info" title="Ver detalhes">
                                <i class="fas fa-eye"></i> Detalhes
                            </a>

                            @if(auth()->user()->tipo_usuario === 2) <!-- Profissional -->
                            @if($consulta->situacao === 1 && \Carbon\Carbon::parse($consulta->agendamento->data_agendamento)->isToday())
                                <form method="POST" action="{{ route('consultas.iniciar', $consulta->id) }}" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit" class="btn btn-sm btn-warning" title="Iniciar consulta" onclick="return confirm('Deseja iniciar esta consulta?')">
                                        <i class="fas fa-play"></i> Iniciar
                                    </button>
                                </form>
                            @endif
                            @if($consulta->situacao === 1)
                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#cancelModal{{ $consulta->id }}" title="Cancelar">
                                    <i class="fas fa-times"></i> Não Posso Atender
                                </button>
                            @endif
                            @if($consulta->situacao === 5) <!-- Consulta em andamento -->
                            <a href="{{ route('consultas.ativa', $consulta->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-redo"></i> Retomar
                            </a>
                            @endif
                            @elseif(auth()->user()->tipo_usuario === 1) <!-- Paciente -->
                            @if($consulta->situacao === 0)
                                <button onclick="confirmAction({{ $consulta->id }}, 'confirmar')" class="btn btn-sm btn-success">
                                    <i class="fas fa-check"></i> Confirmar
                                </button>
                            @elseif($consulta->situacao === 1)
                                <button onclick="confirmAction({{ $consulta->id }}, 'cancelar')" class="btn btn-sm btn-danger">
                                    <i class="fas fa-ban"></i> Cancelar
                                </button>
                            @endif
                            @endif
                        </td>
                    </tr>

                    <!-- Modal para motivo do cancelamento -->
                    <div class="modal fade" id="cancelModal{{ $consulta->id }}" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Motivo para não poder atender</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('consultas.alterarSituacao', $consulta->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="situacao" value="4">
                                    <div class="modal-body">
                                        <textarea name="motivo" class="form-control" placeholder="Descreva o motivo" required></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">Nenhuma consulta encontrada.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        {{ $consultas->links('pagination::bootstrap-4') }}
    </div>

    <script>
        function confirmAction(id, action) {
            const actions = {
                confirmar: { message: 'Você deseja confirmar esta consulta?', situacao: 1 },
                cancelar: { message: 'Você deseja cancelar esta consulta?', situacao: 3 }
            };

            const confirmation = confirm(actions[action].message);
            if (confirmation) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/consultas/${id}/alterar-situacao`;
                form.innerHTML = `
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="PATCH">
                <input type="hidden" name="situacao" value="${actions[action].situacao}">
            `;
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
