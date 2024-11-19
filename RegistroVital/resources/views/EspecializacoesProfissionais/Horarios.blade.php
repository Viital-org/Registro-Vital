@extends($layout)

@section('titulo', 'Cadastrar Horários')

@section('conteudo')

    <div class="container">
        <h2>Cadastrar Horários de Atendimento</h2>

        {{-- Mensagem de erro, incluindo conflitos de horário, intervalo de consulta, e pausa fora do intervalo de atendimento --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Erro:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('horarios.store') }}" method="POST">
            @csrf
            <input type="hidden" name="especializacao_profissional_id" value="{{ $especializacaoProfissional->id }}">

            <div class="form-group">
                <label for="dia_semana">Dia da Semana:</label>
                <select name="dia_semana" id="dia_semana" class="form-control @error('dia_semana') is-invalid @enderror"
                        required>
                    <option value="">Selecione o dia</option>
                    <option value="Segunda-feira">Segunda-feira</option>
                    <option value="Terça-feira">Terça-feira</option>
                    <option value="Quarta-feira">Quarta-feira</option>
                    <option value="Quinta-feira">Quinta-feira</option>
                    <option value="Sexta-feira">Sexta-feira</option>
                    <option value="Sábado">Sábado</option>
                    <option value="Domingo">Domingo</option>
                </select>
                @error('dia_semana')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inicio_atendimento">Início do Atendimento:</label>
                <input type="time" name="inicio_atendimento" id="inicio_atendimento"
                       class="form-control @error('inicio_atendimento') is-invalid @enderror" required>
                @error('inicio_atendimento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fim_atendimento">Fim do Atendimento:</label>
                <input type="time" name="fim_atendimento" id="fim_atendimento"
                       class="form-control @error('fim_atendimento') is-invalid @enderror" required>
                @error('fim_atendimento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempo_consulta">Tempo de Consulta:</label>
                <input type="time" name="tempo_consulta" id="tempo_consulta"
                       class="form-control @error('tempo_consulta') is-invalid @enderror" required>
                @error('tempo_consulta')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inicio_pausa">Início da Pausa:</label>
                <input type="time" name="inicio_pausa" id="inicio_pausa"
                       class="form-control @error('inicio_pausa') is-invalid @enderror">
                @error('inicio_pausa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fim_pausa">Fim da Pausa:</label>
                <input type="time" name="fim_pausa" id="fim_pausa"
                       class="form-control @error('fim_pausa') is-invalid @enderror">
                @error('fim_pausa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar Horário</button>
        </form>
    </div>
@endsection
