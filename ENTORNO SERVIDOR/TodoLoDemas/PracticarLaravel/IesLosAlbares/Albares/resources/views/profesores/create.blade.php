<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de Profesor</title>
</head>

<body>
    <form action="{{ route('profesores.store') }}" method="post">
        @csrf
        <label for="nombre">Nombre del Profesor:</label>
        <input type="text" id="nombre" name="nombre" required><br>
        <br>
        <label for="email">Email:</label>
        <input type="text" id="email" name="email" required>
        <br><br>
        <label for="biografia">Biografia:</label><br>
        <textarea id="biografia" name="biografia" rows="4" cols="50" required></textarea><br><br>
        <label for="experiencia_anios">Experiencia en años:</label>
        <input type="number" id="experiencia_anios" name="experiencia_anios" required>
        <br><br>
        
        <input type="submit" value="Crear Nuevo Profesor">
    </form>
</body>

</html>
