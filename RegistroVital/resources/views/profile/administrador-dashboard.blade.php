@extends($layout)

@section('titulo', 'Registro Vital - Administrador')

@section('conteudo')
    <div class="container my-5">
        @if (session()->has('error'))
            <div id="error-message" class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
            {{ session()->forget('error') }}
        @endif


        <div id="carouselExampleSlidesOnly" class="carousel slide shadow-sm rounded" data-bs-ride="carousel"
             data-bs-interval="3500">
            <div class="carousel-inner">
                @foreach (['img1', 'img2', 'img3', 'img4'] as $image)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img src="{{ asset("img/$image.png") }}" class="d-block w-100 rounded"
                             style="max-height: 530px; opacity: 0.75;">
                    </div>
                @endforeach
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
