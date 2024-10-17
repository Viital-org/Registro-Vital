@extends($layout)

@section('titulo', 'Quem Somos')

@section('conteudo')
    <div class="container my-5">
        <!-- Animação de slogan -->
        <h4 class="text-center text-muted" style="animation: slogan 5s infinite alternate;"><i>Seu diário pessoal de saúde</i></h4>

        <!-- Título principal da página -->
        <div class="text-center mt-5">
            <h1 class="display-4">Quem Somos?</h1>
        </div>

        <!-- Seção de Motivação -->
        <section class="mt-5">
            <h3 class="fw-bold">Motivação</h3>
            <div class="fundo-branco-texto p-4 shadow-sm rounded bg-light">
                <p>
                    No final do ano de 2019 iniciou-se uma cadeia de contaminação pelo vírus da
                    COVID-19. Diante dessa doença que se tornou preocupação mundial, notou-se uma
                    grande queda nos tratamentos por outras doenças, seja pela superlotação dos hospitais
                    ou até mesmo o receio em sair de casa. Pessoas foram acometidas de diversas outras doenças
                    e não buscaram tratamento por conta da preocupação com a COVID-19, fazendo com
                    que a estatística de óbitos por doenças como Dengue, hanseníase e radioterapia disparassem.
                </p>
                <p>
                    A falta de acompanhamento diário dos sintomas de algumas doenças acabou por
                    tardar a sua detecção, compreensão e início do tratamento. Dessa forma, o tratamento
                    tardiamente iniciado pode não somente impossibilitar a cura (a depender da doença),
                    como também a dificultar. As consultas médicas tornaram-se muito mais "corretivas" que
                    preventivas, fazendo com que uma simples consulta torne-se o diagnóstico de
                    talvez uma doença com tratamento complexo.
                </p>
            </div>
        </section>

        <!-- Seção de Objetivo -->
        <section class="mt-5">
            <h3 class="fw-bold">Objetivo</h3>
            <div class="fundo-branco-texto p-4 shadow-sm rounded bg-light">
                <p>
                    Entendendo esse cenário, este projeto propõe-se a fechar a lacuna criada entre
                    paciente-profissional de saúde pelo não acompanhamento regular dos sintomas. Através
                    da disponibilização de uma ferramenta para que o usuário possa fazer anotações durante
                    seu dia de todos os seus sintomas, humor e sentimentos será possível criar um diário
                    que, ao ser compartilhado com um profissional de saúde durante uma consulta, auxiliará
                    em um diagnóstico muito mais assertivo, rápido e completo da atual situação.
                </p>
                <p>
                    Considerando-se a quantidade de doenças que são detectadas tardiamente,
                    nossa busca é possibilitar ao usuário uma forma de prevenir algumas doenças de forma
                    a proporcionar orientação de acordo com cada perfil de usuário, criar estatísticas sobre
                    doenças, idades, gênero e região; e possibilitar um atendimento eficaz para profissionais
                    de saúde, munindo-os de informações que muitas vezes podem ser ocultadas
                    involuntariamente e/ou voluntariamente por conta do nível de sensibilidade.
                </p>
            </div>
        </section>
    </div>

    <!-- Estilos customizados -->
    <style>
        .fundo-branco-texto {
            background-color: #fff;
            color: #333;
            line-height: 1.6;
        }

        .shadow-sm {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        @keyframes slogan {
            0% {
                opacity: 0.7;
            }
            100% {
                opacity: 1;
            }
        }
    </style>
@endsection
