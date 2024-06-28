@extends ('LayoutsPadrao.layoutmedico')

@section('titulo', 'RegistroVital')

@section('conteudo')
    <div class="container">
        @if (session('error'))
            <div id="error-message" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{ asset('img/img1.png') }}" class="d-block w-100 mx-auto rounded shadow-sm" style="max-height: 530px; opacity: 0.6; " >
                </div>
                <div class="carousel-item">
                <img src="{{ asset('img/img2.png') }}" class="d-block w-100 mx-auto rounded shadow-sm" style="max-height: 530px; opacity: 0.6;">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('img/img3.png') }}" class="d-block w-100 mx-auto rounded shadow-sm" style="max-height: 530px; opacity: 0.6;">
                </div>
                <div class="carousel-item">
                <img src="{{ asset('img/img4.png') }}" class="d-block w-100 mx-auto rounded shadow-sm" style="max-height: 530px; opacity: 0.6;">
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
