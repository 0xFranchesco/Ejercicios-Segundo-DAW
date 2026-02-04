<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de Curso</title>
</head>

<body>
    <form action="{{ route('cursos.store') }}" method="post">
        @csrf
        <label for="titulo">Título del Curso:</label>
        <input type="text" id="titulo" name="titulo" required><br>
        <br>
        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required></textarea><br><br>
        <label for="duracion_horas">Duracion en horas:</label>
        <input type="text" id="duracion_horas" name="duracion_horas" required>
        <br><br>
        <label for="profesor_id">Profesor:</label>
        <select name="profesor_id" id="profesor_id" required>
            <option value="">Elige profesor</option>
            @foreach ($profesores as $p)
                <option value="{{ $p->id }}">{{ $p->nombre }}</option>
            @endforeach
        </select>
        <input type="submit" value="Crear Oferta de Trabajo">
    </form>
</body>

</html>
