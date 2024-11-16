@extends($layout)

@section('titulo', 'Meus Agendamentos')

@section('conteudo')
    <div class="container">

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Meus Agendamentos</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Especialização</th>
                            <th>
                                @if(Auth::user()->tipo_usuario === 1)
                                    Profissional
                                @elseif(Auth::user()->tipo_usuario === 2)
                                    Paciente
                                @endif
                            </th>
                            <th>Data do Agendamento</th>
                            <th>Valor da Consulta</th>
                            <th>Endereço</th>
                            <th>Status</th>
                            <th>Duração</th> <!-- Nova coluna para duração -->
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($agendamentos as $agendamento)
                            <tr>
                                {{-- Exibe a especialização ou uma mensagem se não existir --}}
                                <td>{{ $agendamento->especializacao->descricao_especializacao ?? 'Especialização não encontrada' }}</td>

                                {{-- Exibe o nome do profissional ou do paciente conforme o tipo de usuário --}}
                                @if(Auth::user()->tipo_usuario === 1)
                                    <td>{{ $agendamento->profissional->usuario->nome_completo ?? 'Profissional não encontrado' }}</td>
                                @elseif(Auth::user()->tipo_usuario === 2)
                                    <td>{{ $agendamento->paciente->usuario->nome_completo ?? 'Paciente não encontrado' }}</td>
                                @endif

                                {{-- Exibe a data do agendamento --}}
                                <td>{{ $agendamento->data_agendamento }}</td>

                                {{-- Exibe o valor da consulta formatado --}}
                                <td>{{ 'R$ ' . number_format($agendamento->valor_atendimento, 2, ',', '.') }}</td>

                                {{-- Exibe o endereço completo ou mensagem se não existir --}}
                                <td>
                                    {{ $agendamento->endereco->rua ?? 'Rua não encontrada' }},
                                    {{ $agendamento->endereco->numero_endereco ?? 'N/A' }},
                                    {{ $agendamento->endereco->bairro ?? 'Bairro não encontrado' }},
                                    {{ $agendamento->endereco->cidade ?? 'Cidade não encontrada' }}/
                                    {{ $agendamento->endereco->uf ?? 'UF não encontrada' }}
                                </td>

                                {{-- Exibe o status da consulta --}}
                                <td>
                                    @if($agendamento->consulta->situacao === 2)
                                        Finalizada com sucesso
                                    @elseif($agendamento->consulta->situacao === 3)
                                        Cancelada
                                    @elseif($agendamento->consulta->situacao === 4)
                                        Cancelada pelo profissional
                                        <br>
                                        <strong>Motivo:</strong> {{ $agendamento->consulta->motivo ?? 'Não informado' }}
                                    @else
                                        Status desconhecido
                                    @endif
                                </td>

                                {{-- Cálculo e exibição da duração --}}
                                <td>
                                    @if($agendamento->consulta->horario_inicio_real && $agendamento->consulta->horario_fim_real)
                                        @php
                                            $inicio = \Carbon\Carbon::parse($agendamento->consulta->horario_inicio_real);
                                            $fim = \Carbon\Carbon::parse($agendamento->consulta->horario_fim_real);
                                            $duracao = $inicio->diff($fim);

                                            // Formatar a duração em horas e minutos
                                            $duracao_str = $duracao->h . ' hora' . ($duracao->h > 1 ? 's' : '') . ' ' .
                                                           $duracao->i . ' minuto' . ($duracao->i > 1 ? 's' : '');
                                        @endphp
                                        {{ $duracao_str }}
                                    @else
                                        Consulta não ocorreu
                                    @endif
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Paginação --}}
        {{ $agendamentos->links() }}
    </div>
@endsection
