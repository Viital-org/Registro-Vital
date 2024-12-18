@extends ($layout)

@section('titulo', 'Ajuda')

@section('conteudo')

    @csrf
    <br>
    <br>
    <h1><i>Ajuda</i></h1>
    <br>
    <h3><i>O que você encontrará dentro do sistema?</i></h3>
    <p class="fundo-branco-texto">Dentro do sistema de anotações de saúde, os usuários encontrarão uma série de
        funcionalidades projetadas para facilitar o monitoramento de sua saúde e o gerenciamento de consultas médicas. A
        seguir, destacam-se os principais recursos disponíveis: Registro de sintomas e bem-estar, marcação de consultas
        e muito mais.</p>
    <br>

<<<<<<< HEAD
    <h3><i>Acesso pesonalizado</i></h3>
    <div class="fundo-branco-texto">
        <p>- Login Seguro: Cada usuário pode realizar login no sistema, garantindo a segurança e a privacidade de suas
            informações de saúde.</p>
        <p>- Permissões Personalizadas: O tipo de usuário determina suas permissões dentro do sistema:</p>
        <p>- Paciente: Pode marcar, cancelar e alterar consultas, além de verificar seus próprios registros e anotações
            de saúde.</p>
        <p>- Médico: Tem acesso aos cadastros gerais dos pacientes, podendo visualizar e acompanhar os diários de saúde,
            além de gerenciar consultas marcadas.</p>
    </div>
    <br>

    <h3><i>Gerenciamento de consultas</i></h3>
    <div class="fundo-branco-texto">
        <p>- Marcação de Consultas: Os pacientes podem facilmente marcar consultas com seus médicos através do
            sistema.</p>
        <p>- Cancelamento e Alteração: Possibilidade de cancelar ou alterar uma consulta já marcada, facilitando a
            gestão de compromissos médicos.</p>
        <p>- Visualização de Cadastros: Pacientes podem verificar seus cadastros, enquanto médicos têm acesso aos
            cadastros gerais para um acompanhamento mais eficiente.</p>
=======
            <!-- O que você encontrará no sistema -->
            <h3><i>O que você encontrará dentro do sistema?</i></h3>
            <p class="fundo-branco-texto">Dentro do sistema de anotações de saúde, os usuários encontrarão uma série de
                funcionalidades projetadas para facilitar o monitoramento de sua saúde e o gerenciamento de consultas
                médicas.
                A seguir, destacam-se os principais recursos disponíveis: registro de sintomas, marcação de consultas, e
                mais.
            </p>

            <!-- Acesso Personalizado -->
            <h3><i>Acesso Personalizado</i></h3>
            <p class="fundo-branco-texto">
                - <strong>Login Seguro</strong>: Cada usuário pode realizar login no sistema, garantindo a segurança e a
                privacidade.<br>
                - <strong>Permissões Personalizadas</strong>: O tipo de usuário define suas permissões no sistema:
            <ul>
                <li><strong>Paciente</strong>: Pode marcar, cancelar e alterar consultas, além de verificar seus
                    registros.
                </li>
                <li><strong>Médico</strong>: Pode visualizar e acompanhar os diários de saúde, além de gerenciar
                    consultas.
                </li>
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
>>>>>>> develop
    </div>

    <br>

    <h3><i>Benefícios para Pacientes e Profissionais de Saúde</i></h3>
    <div class="fundo-branco-texto">
        <p>- Diagnósticos Mais Precisos: Com o diário de saúde, os profissionais de saúde têm acesso a informações
            detalhadas, possibilitando diagnósticos mais precisos e rápidos.</p>
        <p>- Prevenção e Controle: Acompanhamento regular dos sintomas que pode ajudar na prevenção e controle de
            doenças.</p>
        <p>- Eficiência no Atendimento: Informações detalhadas sobre o histórico de saúde dos pacientes melhoram a
            eficiência e a qualidade do atendimento médico.</p>
    </div>

    <br>

@endsection
