<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cursos</title>
</head>

<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Duracion en horas</th>
        </tr>
        @foreach ($cursos as $curso)
            <tr>
                <td>{{ $curso->titulo }}</td>
                <td>{{ $curso->descripcion }}</td>
                <td>{{ $curso->duracion_horas }}</td>
            </tr>
        @endforeach
    </table>
    <button href="/cursos/create">Crear un nuevo curso</button>
</body>

</html>
