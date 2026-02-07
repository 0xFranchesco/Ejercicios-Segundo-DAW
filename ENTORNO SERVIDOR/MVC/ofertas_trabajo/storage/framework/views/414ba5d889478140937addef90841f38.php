<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ofertas de Trabajo</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>
</head>
<body>

    <?php if(auth()->guard()->check()): ?>
        <h1>Bienvenido, <?php echo e(Auth::user()->name); ?></h1>
        <p><a href="/logout">Click aquí para cerrar sesión</a></p>
    <?php endif; ?>
    <?php if(auth()->guard()->guest()): ?>
        <p><a href="/login">Click aquí para iniciar sesión</a></p>
    <?php endif; ?>

    <table>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Descripción</th>
            <th>Detalles</th>
            <th>Eliminar</th>
        </tr>
        <?php $__currentLoopData = $ofertas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $oferta): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($oferta->titulo); ?></td>
            <td><?php echo e($oferta->empresa); ?></td>
            <td><?php echo e($oferta->descripcion); ?></td>
            <td><a href="/ofertas/<?php echo e($oferta->id); ?>">Ver detalles</a></td>
            <td>
                <form method="POST" action="/ofertas/<?php echo e($oferta->id); ?>">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button>Eliminar</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH /home/iml/Documentos/Docencia/IES Los Albares/25-26/Módulos/2DAW/DWeS/UT05/Proyectos Laravel/ofertas_trabajo/resources/views/ofertas/index.blade.php ENDPATH**/ ?>