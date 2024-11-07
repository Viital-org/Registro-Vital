@extends($layout)

@section('titulo', 'Editar Horário de Atendimento')

@section('conteudo')
    <div class="container">
        <h2>Editar Horário de Atendimento</h2>

        {{-- Exibir mensagens de erro --}}
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

        <form action="{{ route('horarios.update', $horarioAtendimento->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="dia_semana">Dia da Semana</label>
                <select name="dia_semana" class="form-control @error('dia_semana') is-invalid @enderror" required>
                    <option value="">Selecione o dia</option>
                    <option
                        value="Segunda-feira" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Segunda-feira' ? 'selected' : '' }}>
                        Segunda-feira
                    </option>
                    <option
                        value="Terça-feira" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Terça-feira' ? 'selected' : '' }}>
                        Terça-feira
                    </option>
                    <option
                        value="Quarta-feira" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Quarta-feira' ? 'selected' : '' }}>
                        Quarta-feira
                    </option>
                    <option
                        value="Quinta-feira" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Quinta-feira' ? 'selected' : '' }}>
                        Quinta-feira
                    </option>
                    <option
                        value="Sexta-feira" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Sexta-feira' ? 'selected' : '' }}>
                        Sexta-feira
                    </option>
                    <option
                        value="Sábado" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Sábado' ? 'selected' : '' }}>
                        Sábado
                    </option>
                    <option
                        value="Domingo" {{ old('dia_semana', $horarioAtendimento->dia_semana) == 'Domingo' ? 'selected' : '' }}>
                        Domingo
                    </option>
                </select>
                @error('dia_semana')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inicio_atendimento">Início do Atendimento</label>
                <input type="time" name="inicio_atendimento"
                       class="form-control @error('inicio_atendimento') is-invalid @enderror"
                       value="{{ old('inicio_atendimento', isset($horarioAtendimento->inicio_atendimento) ? \Carbon\Carbon::parse($horarioAtendimento->inicio_atendimento)->format('H:i') : '') }}"
                       required>
                @error('inicio_atendimento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fim_atendimento">Fim do Atendimento</label>
                <input type="time" name="fim_atendimento"
                       class="form-control @error('fim_atendimento') is-invalid @enderror"
                       value="{{ old('fim_atendimento', isset($horarioAtendimento->fim_atendimento) ? \Carbon\Carbon::parse($horarioAtendimento->fim_atendimento)->format('H:i') : '') }}"
                       required>
                @error('fim_atendimento')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="tempo_consulta">Tempo de Consulta</label>
                <input type="time" name="tempo_consulta"
                       class="form-control @error('tempo_consulta') is-invalid @enderror"
                       value="{{ old('tempo_consulta', isset($horarioAtendimento->tempo_consulta) ? \Carbon\Carbon::parse($horarioAtendimento->tempo_consulta)->format('H:i') : '') }}"
                       required>
                @error('tempo_consulta')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="inicio_pausa">Início da Pausa</label>
                <input type="time" name="inicio_pausa" class="form-control @error('inicio_pausa') is-invalid @enderror"
                       value="{{ old('inicio_pausa', isset($horarioAtendimento->inicio_pausa) ? \Carbon\Carbon::parse($horarioAtendimento->inicio_pausa)->format('H:i') : '') }}">
                @error('inicio_pausa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="fim_pausa">Fim da Pausa</label>
                <input type="time" name="fim_pausa" class="form-control @error('fim_pausa') is-invalid @enderror"
                       value="{{ old('fim_pausa', isset($horarioAtendimento->fim_pausa) ? \Carbon\Carbon::parse($horarioAtendimento->fim_pausa)->format('H:i') : '') }}">
                @error('fim_pausa')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="{{ route('minhasespecializacoes.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection
