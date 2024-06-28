@extends ('LayoutsPadrao.layoutpaciente')

@section('titulo', 'RegistroVital')

@section('conteudo')
    <div class="container">
        @if (session('error'))
            <div id="error-message" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="container">
            <h1>Menu do Paciente</h1>
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
@endsection

