@extends($layout)

@section('titulo', 'Minhas Especializações')

@section('conteudo')
    <div class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4">Minhas Especializações</h1>
            <a href="{{ route('profissional.especializacoes') }}" class="btn btn-primary">
                Cadastrar Nova Atuação
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Área de Atuação</th>
                    <th>Especialização</th>
                    <th>RQE</th>
                    <th>Endereço</th>
                    <th>Valor Atendimento</th>
                    <th>Horários</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @forelse($especializacoesprofissional as $especializacaoprofissional)
                    <tr>
                        <td>{{ $especializacaoprofissional->id }}</td>
                        <td>{{ $especializacaoprofissional->areas_atuacao->descricao_area ?? 'N/A' }}</td>
                        <td>{{ $especializacaoprofissional->especializacoes->descricao_especializacao ?? 'N/A' }}</td>
                        <td>{{ $especializacaoprofissional->rqe }}</td>
                        <td>
                            {{ $especializacaoprofissional->enderecos->rua }},
                            {{ $especializacaoprofissional->enderecos->numero_endereco }} -
                            {{ $especializacaoprofissional->enderecos->bairro }},
                            {{ $especializacaoprofissional->enderecos->cidade }}
                            -{{ $especializacaoprofissional->enderecos->uf }},
                            {{ $especializacaoprofissional->enderecos->cep }}
                        </td>
                        <td>R$ {{ number_format($especializacaoprofissional->valor_atendimento, 2, ',', '.') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('horarios.cadastrar', ['id' => $especializacaoprofissional->id]) }}"
                                   class="btn btn-success btn-sm">
                                    Cadastrar
                                </a>
                                @if($especializacaoprofissional->horariosAtendimento && $especializacaoprofissional->horariosAtendimento->isNotEmpty())
                                    <a href="{{ route('horarios.listar', ['id' => $especializacaoprofissional->id]) }}"
                                       class="btn btn-info btn-sm">
                                        Ver Horários
                                    </a>
                                @endif
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#delete{{ $especializacaoprofissional->id }}">
                                Excluir
                            </button>
                            <!-- Modal de Confirmação -->
                            <form
                                action="{{ route('excluirespecializacao.destroy', ['id'=> $especializacaoprofissional->id]) }}"
                                method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal fade" id="delete{{ $especializacaoprofissional->id }}" tabindex="-1"
                                     role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Confirmação de Exclusão</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Fechar"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Deseja realmente excluir a especialização
                                                    <strong>{{ $especializacaoprofissional->especializacoes->descricao_especializacao }}</strong>?
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Cancelar
                                                </button>
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Nenhuma especialização cadastrada.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <!-- Paginação -->
        <div class="mt-3">
            {{ $especializacoesprofissional->links() }}
        </div>
    </div>
@endsection
