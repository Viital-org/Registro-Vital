@extends($layout)

@section('titulo', 'Horários de Atendimento')

@section('conteudo')
    <div class="container">
        <h2>Horários de Atendimento</h2>
        <table class="table">
            <thead>
            <tr>
                <th>Dia da Semana</th>
                <th>Início</th>
                <th>Fim</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($horarios as $horario)
                <tr>
                    <td>{{ $horario->dia_semana }}</td>
                    <td>{{ $horario->inicio_atendimento }}</td>
                    <td>{{ $horario->fim_atendimento }}</td>
                    <td>
                        <a href="{{ route('horarios.edit', $horario->id) }}" class="btn btn-primary">Editar</a>
                        <form action="{{ route('horarios.destroy', $horario->id) }}" method="POST"
                              style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Tem certeza de que deseja excluir este horário?')">Excluir
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
