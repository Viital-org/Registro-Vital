@php use Carbon\Carbon; @endphp
@extends($layout)

@section('titulo', 'Dashboard - Paciente')

@section('conteudo')
    <div class="container mx-auto p-4 md:p-6 space-y-6">
        {{-- Mensagem de Boas-Vindas --}}
        <div class="p-4 rounded-md shadow-md" style="background-color: #A0D3E8; color: white;">
            <h1 class="text-2xl md:text-3xl font-bold text-center md:text-left">
                Bem-vindo, {{ Auth::user()->nome_completo }}
            </h1>
            <p class="text-sm mt-2 text-center md:text-left">
                Aqui você encontra suas informações de saúde, agendamentos e anotações.
            </p>
        </div>

        {{-- Dica do Dia --}}
        <div class="bg-gray-50 border border-gray-200 rounded-md shadow-md p-4">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-lightbulb mr-2" style="color: #007bff"></i> Dica do Dia
            </h2>
            <p class="text-sm text-gray-500 mt-1">Categoria: Saúde</p>
            <p class="text-sm text-gray-500">Data: {{ now()->format('d/m/Y') }}</p>
            <p class="mt-4 text-gray-700">
                Mantenha-se hidratado! Tome pelo menos 2 litros de água por dia para melhorar sua saúde.
            </p>
        </div>

        {{-- Últimas Anotações --}}
        <div class="bg-white border border-gray-200 rounded-md shadow-md p-4">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-book mr-2" style="color: #007bff"></i> Últimas Anotações
            </h2>
            <ul class="mt-4 space-y-3">
                @foreach ($anotacoes as $anotacao)
                    <li class="flex flex-col md:flex-row justify-between items-start md:items-center">
                        <span class="text-gray-600">{{ $anotacao->descricao_anotacao }}</span>
                        <span
                            class="text-sm text-gray-400 mt-2 md:mt-0">{{ $anotacao->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                @endforeach
                @if ($anotacoes->isEmpty())
                    <p class="text-gray-500">Você ainda não fez nenhuma anotação.</p>
                @endif
            </ul>
        </div>

        {{-- Próximos Agendamentos --}}
        <div class="bg-gray-50 border border-gray-200 rounded-md shadow-md p-4">
            <h2 class="text-lg md:text-xl font-semibold" style="color: #000000;">
                <i class="fas fa-calendar-alt mr-2" style="color: #007bff"></i> Próximos Agendamentos
            </h2>
            <div class="overflow-x-auto mt-4">
                <table class="w-full text-sm text-left border-collapse border border-gray-300">
                    <thead>
                    <tr class="bg-gray-100 text-gray-600 border-b border-gray-300">
                        <th class="py-2 px-4 text-center">Data</th>
                        <th class="py-2 px-4 text-center">Hora</th>
                        <th class="py-2 px-4 text-center">Tipo de Consulta</th>
                        <th class="py-2 px-4 text-center">Profissional</th>
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
                                {{ $agendamento->especializacao->area->descricao_area ?? 'Não especificado' }}
                            </td>
                            <td class="py-2 px-4 text-center border-b border-gray-300">
                                {{ $agendamento->profissional->usuario->nome_completo ?? 'Não especificado' }}
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
