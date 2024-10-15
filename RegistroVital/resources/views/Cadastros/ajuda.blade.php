@extends($layout)

@section('titulo', 'Ajuda')

@section('conteudo')

    <div class="container my-5">
        <div class="card shadow-sm p-4">
            <h1 class="text-center mb-4"><i>Ajuda</i></h1>

            <!-- O que você encontrará no sistema -->
            <h3><i>O que você encontrará dentro do sistema?</i></h3>
            <p class="fundo-branco-texto">Dentro do sistema de anotações de saúde, os usuários encontrarão uma série de
                funcionalidades projetadas para facilitar o monitoramento de sua saúde e o gerenciamento de consultas médicas.
                A seguir, destacam-se os principais recursos disponíveis: registro de sintomas, marcação de consultas, e mais.
            </p>

            <!-- Acesso Personalizado -->
            <h3><i>Acesso Personalizado</i></h3>
            <p class="fundo-branco-texto">
                - <strong>Login Seguro</strong>: Cada usuário pode realizar login no sistema, garantindo a segurança e a privacidade.<br>
                - <strong>Permissões Personalizadas</strong>: O tipo de usuário define suas permissões no sistema:
            <ul>
                <li><strong>Paciente</strong>: Pode marcar, cancelar e alterar consultas, além de verificar seus registros.</li>
                <li><strong>Médico</strong>: Pode visualizar e acompanhar os diários de saúde, além de gerenciar consultas.</li>
            </ul>
            </p>

            <!-- Gerenciamento de Consultas -->
            <h3><i>Gerenciamento de Consultas</i></h3>
            <p class="fundo-branco-texto">
                - Marcação de consultas de forma fácil e rápida.<br>
                - Cancelamento e alteração de consultas de maneira conveniente.<br>
                - Pacientes e médicos podem visualizar cadastros e acompanhar o histórico médico.
            </p>

            <!-- Benefícios -->
            <h3><i>Benefícios para Pacientes e Profissionais de Saúde</i></h3>
            <p class="fundo-branco-texto">
                - Diagnósticos mais precisos através do acompanhamento detalhado do histórico.<br>
                - Prevenção e controle de doenças com o monitoramento regular dos sintomas.<br>
                - Melhoria na eficiência do atendimento com informações mais completas.
            </p>
        </div>
    </div>

@endsection

