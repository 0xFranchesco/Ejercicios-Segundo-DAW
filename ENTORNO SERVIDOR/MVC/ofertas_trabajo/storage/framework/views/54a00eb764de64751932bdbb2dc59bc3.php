<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas de Trabajo</title>
</head>
<body>
    <table>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Descripción</th>
        </tr>
        <tr>
            <td><?php echo e($oferta->titulo); ?></td>
            <td><?php echo e($oferta->empresa); ?></td>
            <td><?php echo e($oferta->descripcion); ?></td>
        </tr>
    </table>
</body>
</html><?php /**PATH C:\Users\franc\Documents\RepoGithub\Ejercicios-Segundo-DAW\ENTORNOS SERVIDOR\MVC\ofertas_trabajo\resources\views/ofertas/show.blade.php ENDPATH**/ ?>