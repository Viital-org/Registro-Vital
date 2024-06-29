@extends ($layout)

@section('titulo', 'Quem Somos')

@section('conteudo')

@csrf

<h3><i>Seu diário pessoal de saúde</i></h3>
<br>
<h1>Quem Somos?</h1>
<br>
<h3>Motivação</h3>
<p> No final do ano de 2019 iniciou-se uma cadeia de contaminação pelo vírus da
COVID-19. Diante dessa doença que se tornou preocupação mundial, notou-se uma
grande queda nos tratamentos por outras doenças, seja pela superlotação dos hospitais ou até mesmo o
receio em sair de casa. Pessoas foram acometidas de diversas outras doenças
e não buscaram tratamento por conta da preocupação com a COVID-19, fazendo com
que a estatística de óbitos por doenças como Dengue, hanseníase e radioterapia
disparassem. </p>
<p> A falta de acompanhamento diário dos sintomas de algumas doenças acabou por
tardar a sua detecção, compreensão e início do tratamento. Dessa forma, o tratamento
tardiamente iniciado pode não somente impossibilitar a cura (a depender da doença),
como também a dificultar. As consultas médicas tornaram-se muito mais "corretivas" que
preventivas, assim fazendo com que uma simples consulta torne-se o diagnóstico de
talvez uma doença com tratamento complexo. </p>
<h3>Objetivo</h3>
<p> Entendendo esse cenário, este projeto propõe-se a fechar a lacuna criada entre
paciente-profissional de saúde pelo não acompanhamento regular dos sintomas. Através
da disponibilização de uma ferramenta para que o usuário possa fazer anotações durante
seu dia de todos os seus sintomas, humor e sentimentos será possível criar um diário
que ao ser compartilhado para um profissional de saúde durante uma consulta auxiliará
em um diagnóstico muito mais assertivo, rápido e completo da atual situação.
Considerando-se a quantidade de doenças que são detectadas tardiamente,
nossa busca é possibilitar ao usuário uma forma de prevenir algumas doenças de forma
a proporcionar orientação de acordo com cada perfil de usuário, criar estatísticas sobre
doenças, idades, gênero e região; e possibilitar o atendimento eficaz para profissionais
de saúde, munindo-os de informações que muitas vezes podem ser ocultadas
involuntariamente e ou voluntariamente por conta do nível de sensibilidade.</p>



@endsection
