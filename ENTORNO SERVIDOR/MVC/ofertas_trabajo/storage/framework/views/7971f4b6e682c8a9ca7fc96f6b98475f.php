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

    <h1>Bienvenido <?php echo e(Auth::user()->name); ?> </h1>
    <p><a href="/logout">Click aquí para cerrar sesion</a></p>

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
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('manage')): ?>
                <form method="POST" action="/ofertas/<?php echo e($oferta->id); ?>">
                    <?php echo method_field('DELETE'); ?>
                    <?php echo csrf_field(); ?>
                    <button>Eliminar</button>
                </form>
            <?php endif; ?>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</body>
</html><?php /**PATH C:\Users\franc\Documents\RepoGithub\Ejercicios-Segundo-DAW\ENTORNO SERVIDOR\MVC\ofertas_trabajo\resources\views/ofertas/index.blade.php ENDPATH**/ ?>