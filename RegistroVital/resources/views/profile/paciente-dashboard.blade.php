<<<<<<< HEAD
@extends ($layout)
=======
@extends($layout)
>>>>>>> develop

@section('titulo', 'RegistroVital')

@section('conteudo')
    <div class="container">
        @if (session('error'))
            <div id="error-message" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
<<<<<<< HEAD
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('img/img1.png') }}" class="d-block w-100 mx-auto rounded shadow-sm"
                             style="max-height:530px; opacity: 0.6; ">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/img2.png') }}" class="d-block w-100 mx-auto rounded shadow-sm"
                             style="max-height:530px; opacity: 0.6;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/img3.png') }}" class="d-block w-100 mx-auto rounded shadow-sm"
                             style="max-height:530px; opacity: 0.6;">
                    </div>
                    <div class="carousel-item">
                        <img src="{{ asset('img/img4.png') }}" class="d-block w-100 mx-auto rounded shadow-sm"
                             style="max-height:530px; opacity: 0.6;">
                    </div>
                </div>
            </div>


            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var errorMessage = document.getElementById('error-message');
                    if (errorMessage) {
                        setTimeout(function () {
                            errorMessage.style.display = 'none';
                        }, 3000);
                    }
                });
            </script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

=======

        <div class="header row">
            <h1>Bem-vindo... {{ Auth::user()->nome_completo }}</h1>
        </div>

        <div class="row dica">
            <h3>Dica do Dia</h3>
            <h6>Categoria da dica</h6>
            <p>XX/XX/XXXX</p>
            <p>(Conteúdo da dica) Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat deleniti sint a
                harum itaque suscipit nam neque saepe, ut veniam alias, aperiam aliquam, rerum quasi officiis illo eum
                unde. Nulla.</p>
        </div>

        <div class="row">
            <div class="anotacoes col">
                <h3 class="infos-paciente">Última Anotações</h3>

                <table>
                    <!-- foreach -->
                    <thead>
                    <tr>
                        <td><h6>Data e hora</h6></td> <!-- Ex: XX/XX/XXXX - XX:XX -->
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Natus aspernatur numquam tempora
                            velit
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="agendamentos col">
                <h3 class="infos-paciente">Agendamentos</h3>
                <!-- foreach -->
                <div class="row">
                    <div class="col">
                        <table class="tabela-agendamento">
                            <tr>
                                <td><h6>Data e hora</h6></td> <!-- Ex: XX/XX/XXXX - XX:XX -->
                            </tr>
                            <tr>
                                <td>Tipo da consulta</td> <!-- (Ex: consulta ginecologista) -->
                                <td>Nome médico</td>
                            </tr>
                        </table>
                    </div>
                </div>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
>>>>>>> develop
