@extends($layout)

@section('titulo', 'Minhas Consultas')

@section('conteudo')
    <table class="table">
        <thead>
        <tr>
            <th>Data</th>
            <th>Status</th>
            <th>Área Médica</th>
            <th>Ações</th>
        </tr>
        </thead>
        <tbody>
        @forelse($consultas as $consulta)
            <tr>
                <td>{{ $consulta->agendamento->data_agendamento }}</td>
                <td>
                    @switch($consulta->situacao)
                        @case(0) Pendente @break
                        @case(1) Confirmada @break
                        @case(2) Finalizada @break
                        @default Cancelada
                    @endswitch
                </td>
                <td>{{ $consulta->agendamento->especializacao->area->descricao_area ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('consultas.show', $consulta->id) }}" class="btn btn-primary">Detalhes</a>

                    @if(auth()->user()->tipo_usuario === 2) <!-- Profissional -->
                    @if($consulta->situacao === 1 && \Carbon\Carbon::parse($consulta->agendamento->data_agendamento)->isToday())
                        <form method="POST" action="{{ route('consultas.iniciar', $consulta->id) }}" onsubmit="return confirm('Deseja iniciar esta consulta?')">
                            @csrf
                            @method('PATCH')
                            <button type="submit" class="btn btn-warning">Iniciar Consulta</button>
                        </form>
                    @endif
                    @if($consulta->situacao === 1)
                        <button data-toggle="modal" data-target="#cancelModal{{ $consulta->id }}" class="btn btn-danger">Não posso Atender</button>
                    @endif
                    @if($consulta->situacao === 5) <!-- Consulta em andamento -->
                    <a href="{{ route('consultas.ativa', $consulta->id) }}" class="btn btn-success">Voltar para Consulta Ativa</a>
                    @endif
                    @elseif(auth()->user()->tipo_usuario === 1) <!-- Paciente -->
                    @if($consulta->situacao === 0)
                        <button onclick="confirmAction({{ $consulta->id }}, 'confirmar')" class="btn btn-success">Confirmar</button>
                    @elseif($consulta->situacao === 1)
                        <button onclick="confirmAction({{ $consulta->id }}, 'cancelar')" class="btn btn-danger">Cancelar</button>
                    @endif
                    @endif
                </td>
            </tr>

            <!-- Modal para motivo do cancelamento -->
            <div class="modal fade" id="cancelModal{{ $consulta->id }}" tabindex="-1" role="dialog" aria-hidden="true">
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
                                <textarea name="motivo" class="form-control" placeholder="Motivo do cancelamento" required></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Alterar Status</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <tr>
                <td colspan="4" class="text-center">Nenhuma consulta encontrada.</td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{ $consultas->links() }}

    <script>
        function confirmAction(id, action) {
            let message;
            let situacao;

            switch (action) {
                case 'confirmar':
                    message = 'Você tem certeza que deseja confirmar esta consulta?';
                    situacao = 1;
                    break;
                case 'cancelar':
                    message = 'Você tem certeza que deseja cancelar esta consulta?';
                    situacao = 3;
                    break;
            }

            if (confirm(message)) {
                const form = document.createElement('form');

                form.method = 'POST';
                form.action = `/consultas/${id}/alterar-situacao`;

                // Adicione os campos necessários para suportar o método PATCH e CSRF
                form.innerHTML = `
            <input type="hidden" name="_token" value="${document.querySelector('meta[name="csrf-token"]').getAttribute('content')}">
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="situacao" value="${situacao}">
        `;

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
@endsection
