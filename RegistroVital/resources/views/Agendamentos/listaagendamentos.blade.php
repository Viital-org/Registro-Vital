@extends($layout)

@section('titulo', 'Meus Agendamentos')

@section('conteudo')
    <section class="py-5">
        <div class="container px-5 mb-5">
            <div class="text-center mb-5">
                <h1 class="fs-2 fw-bold mb-0"><span class="text-gradient d-inline">Agendamentos realizados</span></h1>
            </div>

            @foreach($agendamentos as $agendamento)
                <div class="row gx-5 justify-content-center mt-3">
                    <div class="col-lg-11 col-xl-9 col-xxl-8">
                        <div class="card overflow-hidden shadow rounded-4 border-0">
                            <div class="card-body p-0">
                                <div class="d-flex align-items-center">
                                    <div class="p-4">
                                        <h4 class="fw-bolder">
                                            {{-- Exibe o nome do profissional e a especialização conforme o tipo de usuário --}}
                                            @if(Auth::user()->tipo_usuario === 1)
                                                <td>{{ $agendamento->profissional->usuario->nome_completo ?? 'Profissional não encontrado' }}</td>
                                            @elseif(Auth::user()->tipo_usuario === 2)
                                                <td>{{ $agendamento->paciente->usuario->nome_completo ?? 'Paciente não encontrado' }}</td>
                                            @endif
                                            - {{ $agendamento->especializacao->descricao_especializacao ?? 'Especialização não encontrada' }}
                                        </h4>

                                        {{-- Exibe a data do agendamento --}}
                                        <p class="fw-bolder">
                                            Tipo: <i class="fw-normal">{{ $agendamento->data_agendamento }}</i>
                                        </p>

                                        {{-- Exibe o valor do agendamento --}}
                                        <p class="fw-bolder">
                                            Valor: <i
                                                class="fw-normal"> {{ 'R$ ' . number_format($agendamento->valor_atendimento, 2, ',', '.') }} </i>
                                        </p>

                                        {{-- Exibe o endereço do agendamento --}}
                                        <p class="fw-bolder">
                                            Endereço: <i
                                                class="fw-normal">{{ $agendamento->endereco->rua ?? 'Rua não encontrada' }}
                                                ,
                                                {{ $agendamento->endereco->numero_endereco ?? 'N/A' }},
                                                {{ $agendamento->endereco->bairro ?? 'Bairro não encontrado' }},
                                                {{ $agendamento->endereco->cidade ?? 'Cidade não encontrada' }},
                                                {{ $agendamento->endereco->uf ?? 'UF não encontrada' }} </i>
                                        </p>

                                        <div class="fw-bolder d-flex justify-content-between">
                                            {{-- Exibe o status do agendamento --}}
                                            <p class="fw-bolder">
                                                Status:
                                                <i class="fw-normal">
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
                                                </i>
                                            </p>

                                            {{-- Exibe a duração do agendamento --}}
                                            <p class="fw-bolder">
                                                Duração:
                                                <i class="fw-normal">
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
                                                </i>
                                            </p>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Paginação --}}
    {{ $agendamentos->links() }}
@endsection
