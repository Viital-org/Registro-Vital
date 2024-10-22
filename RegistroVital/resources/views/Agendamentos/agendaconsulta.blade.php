@extends($layout)

@section('titulo', 'Agendar Consulta')

@section('conteudo')
    <div class="container">
        <h1>Agendar Consulta</h1>
        <form action="{{ route('agendamentos.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="area_atuacao_id" class="form-label">Área de atuação</label>
                <select name="area_atuacao_id" id="area_atuacao_id" class="form-select" required>
                    @foreach($areas_atuacao as $area_atuacao)
                        <option value="{{ $area_atuacao->id}}">{{ $area_atuacao->descricao_area }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="especializacao_id" class="form-label">Especialização</label>
                <select name="especializacao_id" id="especializacao_id" class="form-select" required>
                    @foreach($areas_atuacao as $area)
                            @foreach($area->especializacoes as $especializacao)
                                <option value="{{ $especializacao->id }}">{{ $especializacao->descricao_especializacao }}</option>
                            @endforeach
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="profissional_id" class="form-label">Profissional</label>
                <select name="profissional_id" id="profissional_id" class="form-select" required>
                    @foreach($profissionais as $profissional)
                        <option value="{{$profissional->id}}"> {{ $profissional->nome_completo}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="data_agendamento" class="form-label">Data do Agendamento</label>
                <input type="date" name="data_agendamento" id="data_agendamento" class="form-control" required
                       min="{{ date('Y-m-d') }}">
            </div>
            <button type="submit" class="btn btn-primary">Agendar</button>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#especializacao_id').change(function () {
                var especializacaoId = $(this).val();
                if (especializacaoId) {
                    $.ajax({
                        url: '{{ url("/profissionais-by-especializacao") }}/' + especializacaoId,
                        type: 'GET',
                        dataType: 'json',
                        success: function (data) {
                            $('#profissional_id').empty().append('<option value="">Selecione um Profissional</option>');
                            $.each(data, function (key, value) {
                                $('#profissional_id').append('<option value="' + value.id + '">' + value.nome + '</option>');
                            });
                        }
                    });
                } else {
                    $('#profissional_id').empty().append('<option value="">Selecione um Profissional</option>');
                }
            });
        });
    </script>
@endsection

