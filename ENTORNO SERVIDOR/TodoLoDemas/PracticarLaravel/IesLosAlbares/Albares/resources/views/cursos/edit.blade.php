<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edicion de Curso</title>
</head>

<body>
    <form action="{{ route('cursos.update', $curso) }}" method="post">
        @csrf
        @method('PATCH')
        <label for="titulo">Título del Curso:</label>
        <input type="text" id="titulo" name="titulo" value="{{ $curso->titulo }}" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required>{{ $curso->descripcion }}</textarea><br><br>

        <label for="duracion_horas">Duracion en horas:</label>
        <input type="text" id="duracion_horas" name="duracion_horas" value="{{ $curso->duracion_horas }}"
            required><br><br>
           

        <input type="submit" value="Editar Curso">
    </form>
</body>

</html>
