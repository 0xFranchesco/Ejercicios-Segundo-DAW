<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Creación de Oferta de Trabajo</title>
</head>
<body>
    <form action="/ofertas/<?php echo e($oferta->id); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>
        <label for="titulo">Título del Trabajo:</label>
        <input type="text" id="titulo" name="titulo" value="<?php echo e($oferta->titulo); ?>" required><br><br>

        <label for="empresa">Empresa:</label>
        <input type="text" id="empresa" name="empresa" value="<?php echo e($oferta->empresa); ?>" required><br><br>

        <label for="descripcion">Descripción:</label><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" required><?php echo e($oferta->descripcion); ?></textarea><br><br>

        <input type="submit" value="Crear Oferta de Trabajo">
    </form>
</body>
</html><?php /**PATH /home/iml/Documentos/Docencia/IES Los Albares/25-26/Módulos/2DAW/DWeS/UT05/Proyectos Laravel/ofertas_trabajo/resources/views/ofertas/edit.blade.php ENDPATH**/ ?>