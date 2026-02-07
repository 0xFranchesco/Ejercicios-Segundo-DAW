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
</html><?php /**PATH /home/iml/Documentos/Docencia/IES Los Albares/25-26/Módulos/2DAW/DWeS/UT05/Proyectos Laravel/ofertas_trabajo/resources/views/ofertas/show.blade.php ENDPATH**/ ?>