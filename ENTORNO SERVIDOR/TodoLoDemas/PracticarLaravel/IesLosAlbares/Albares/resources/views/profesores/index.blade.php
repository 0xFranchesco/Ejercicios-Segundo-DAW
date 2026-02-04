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
            <th>Nombre</th>
            <th>Email</th>
            <th>Biografia</th>
            <th>Años de experiencia</th>
        </tr>
        @foreach ($profesores as $profesor)
  <h3>{{ $profesor->nombre }}</h3>
  <p>{{ $profesor->email }}</p>

  <p>{{ $profesor->perfilProfesor?->biografia ?? 'Sin perfil' }}</p>
  <p>{{ $profesor->perfilProfesor?->experiencia_anios ?? '—' }}</p>

  <hr>
@endforeach
    </table>
    <button href="/cursos/create">Crear un nuevo profesor</button>
</body>

</html>