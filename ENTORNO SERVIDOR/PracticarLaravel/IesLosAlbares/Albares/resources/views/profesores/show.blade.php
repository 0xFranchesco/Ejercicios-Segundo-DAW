<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initialscale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profesor</title>
</head>

<body>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Biografia</th>
            <th>Experiencia en años</th>
        </tr>
        <tr>
            <td>{{ $profesor->nombre }}</td>
            <td>{{ $profesor->email }}</td>
            <td>{{ $profesor->perfilProfesor->biografia }}</td>
            <td>{{ $profesor->perfilProfesor->experiencia_anios }}</td>
        </tr>
    </table>
</body>

</html>