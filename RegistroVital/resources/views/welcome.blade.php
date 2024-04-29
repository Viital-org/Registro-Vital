<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo</title>
</head>
<body>
<h1>Bem-vindo ao Sistema</h1>
<ul>
    <li><a href="{{ route('pacientes-index') }}">Lista de Pacientes</a></li>
    <li><a href="{{ route('profissionais-index') }}">Lista de Profissionais</a></li>
    <li><a href="{{ route('consultas-index') }}">Lista de Consultas</a></li>
    <li><a href="{{ route('atuaareas-index') }}">Lista de Areas de Atuação</a></li>
</ul>
</body>
</html>
