<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Curso</title>
</head>

<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Descripcion</th>
            <th>Duracion en horas</th>
        </tr>
        <tr>
            <td>{{ $curso->titulo }}</td>
            <td>{{ $curso->descripcion }}</td>
            <td>{{ $curso->duracion_horas }}</td>
        </tr>
    </table>
</body>

</html>
