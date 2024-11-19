@php use Carbon\Carbon; @endphp
@extends($layout)

@section('titulo', 'Dashboard - Profissional de Saúde')

@section('conteudo')
    <div class="container mx-auto p-4 md:p-6 space-y-6">

        {{-- Mensagem de Boas-Vindas --}}
        <div class="p-4 rounded-md shadow-md" style="background-color: #A0D3E8; color: white;">
            <h1 class="text-2xl md:text-3xl font-bold text-center md:text-left">
                Bem-vindo, Dr(a). {{ Auth::user()->nome_completo }}
            </h1>
            <p class="text-sm mt-2 text-center md:text-left">
                Aqui você encontra suas informações profissionais, agenda e acompanhamento de pacientes.
            </p>
        </div>

        {{-- Dica Profissional --}}
        <div class="bg-gray-50 border border-gray-200 rounded-md shadow-md p-4">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-lightbulb mr-2" style="color: #007bff"></i> Dica para Profissionais
            </h2>
            <p class="text-sm text-gray-500 mt-1">Categoria: Saúde</p>
            <p class="text-sm text-gray-500">Data: {{ now()->format('d/m/Y') }}</p>
            <p class="mt-4 text-gray-700">
                Revise regularmente o histórico dos pacientes para garantir diagnósticos mais precisos.
            </p>
        </div>

        {{-- Pacientes Acompanhados --}}
        <div class="bg-white border border-gray-200 rounded-md shadow-md p-4">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-users mr-2" style="color: #007bff"></i> Pacientes Acompanhados
            </h2>
            <ul class="mt-4 space-y-3">
                @foreach ($pacientes as $paciente)
                    <li class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <span class="text-gray-600">{{ $paciente->nome_completo }}</span>
                        <span class="text-sm text-gray-400 mt-2 md:mt-0">
                            Última consulta: {{ $paciente->ultima_consulta }}
                        </span>
                    </li>
                @endforeach
                @if ($pacientes->isEmpty())
                    <p class="text-gray-500">Nenhum paciente sob acompanhamento no momento.</p>
                @endif
            </ul>
        </div>

        {{-- Próximos Agendamentos --}}
        <div class="bg-gray-50 border border-gray-200 rounded-md shadow-md p-4 mt-6">
            <h2 class="text-lg md:text-xl font-semibold">
                <i class="fas fa-calendar-alt mr-2" style="color: #007bff" ></i> Próximos Agendamentos
            </h2>
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-sm text-left border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 border-b border-gray-300">
                        <th class="py-2 px-4 text-center">Data</th>
                        <th class="py-2 px-4 text-center">Hora</th>
                        <th class="py-2 px-4 text-center">Paciente</th>
                        <th class="py-2 px-4 text-center">Especialização</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($agendamentos as $agendamento)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 text-center border-b border-gray-300">
                                {{ Carbon::parse($agendamento->data_agendamento)->format('d/m/Y') }}
                            </td>
                            <td class="py-2 px-4 text-center border-b border-gray-300">
                                {{ Carbon::parse($agendamento->hora_agendamento)->format('H:i') }}
                            </td>
                            <td class="py-2 px-4 text-center border-b border-gray-300">
                                {{ $agendamento->paciente->usuario->nome_completo ?? 'N/A' }}
                            </td>
                            <td class="py-2 px-4 text-center border-b border-gray-300">
                                {{ $agendamento->especializacao->descricao_especializacao ?? 'N/A' }}
                            </td>
                        </tr>
                    @endforeach
                    @if ($agendamentos->isEmpty())
                        <tr>
                            <td colspan="4" class="py-4 text-gray-500 text-center border-b border-gray-300">
                                Nenhum agendamento encontrado.
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Estatísticas --}}
        <div class="mt-6 bg-white border border-gray-200 rounded-md shadow-md p-4">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-chart-bar mr-2" style="color: #007bff"></i> Estatísticas
            </h2>
            <ul>
                <li>Total de pacientes atendidos: {{ $estatisticas['pacientes_atendidos'] }}</li>
                <li>Próximos agendamentos: {{ $estatisticas['proximos_agendamentos'] }}</li>
            </ul>
        </div>

        {{-- Feedbacks Recentes --}}
        <div class="bg-white border border-gray-200 rounded-md shadow-md p-4 mt-6">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-comment-dots mr-2" style="color: #007bff"></i> Feedbacks Recentes
            </h2>
            <ul class="mt-4 space-y-3">
                {{-- @foreach ($feedbacks as $feedback)
                    <li class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <span class="text-gray-600">{{ $feedback->descricao_feedback }}</span>
                        <span class="text-sm text-gray-400 mt-2 md:mt-0">
                            Enviado por: {{ $feedback->paciente->nome_completo }}
                        </span>
                    </li>
                @endforeach
                @if ($feedbacks->isEmpty())
                    <p class="text-gray-500">Nenhum feedback recebido.</p>
                @endif--}}
            </ul>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                setTimeout(() => errorMessage.style.display = 'none', 3000);
            }
        });
    </script>
@endsection
