@extends('LayoutsPadrao.layoutpaciente')

@section('titulo', 'Registro Vital - Paciente')

@section('conteudo')
    <div class="container my-5">
        <!-- Exibir mensagem de erro se existir -->
        @if (session('error'))
            <div id="error-message" class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        <!-- Carousel de Imagens -->
        <div id="carouselExampleSlidesOnly" class="carousel slide shadow-sm rounded" data-bs-ride="carousel"
             data-bs-interval="3500">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/img1.png') }}" class="d-block w-100 rounded"
                         style="max-height: 530px; opacity: 0.75;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/img2.png') }}" class="d-block w-100 rounded"
                         style="max-height: 530px; opacity: 0.75;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/img3.png') }}" class="d-block w-100 rounded"
                         style="max-height: 530px; opacity: 0.75;">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/img4.png') }}" class="d-block w-100 rounded"
                         style="max-height: 530px; opacity: 0.75;">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
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

    <!-- Importando scripts do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
