<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initialscale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Creación de Zulo</title>
</head>
<body>
<form action="/zulos" method="post">
    <?php echo csrf_field(); ?>
<label for="titulo">Título del Zulo:</label>
<input type="text" id="titulo" name="titulo" required><br>
<br>
<label for="descripcion">Descripcion:</label>
<textarea id="descripcion" name="descripcion" rows="4"
cols="20" required></textarea><br><br>
<br>
<label for="ubicacion">Ubicacion:</label>
<input type="text" id="ubicacion" name="ubicacion" required>
<br><br>
<label for="superficie">Superficie:</label>
<input type="text" id="superficie" name="superficie" required>
<br><br>
<label for="precio">Precio:</label>
<input type="text" id="precio" name="precio" required>
<br><br>

<input type="submit" value="Crear Zulo">
</form>
</body>
</html><?php /**PATH C:\Users\franc\Documents\RepoGithub\Ejercicios-Segundo-DAW\ENTORNO SERVIDOR\ExamenLaravel\ExamenFranCas\resources\views/zulos/create.blade.php ENDPATH**/ ?>