<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fotozulo - Listado</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6; }
        .filtro { background: #f4f4f4; padding: 15px; border-radius: 5px; margin-bottom: 20px; }
        .zulos { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 20px; }
        .zulo { border: 1px solid #ccc; padding: 15px; border-radius: 8px; }
        .precio { font-weight: bold; color: #2c3e50; font-size: 1.2em; }
    </style>
</head>
<body>

    <h1>Fotozulo: Alquiler de zulos</h1>

        
    <section class="filtro">
        <form action="/zulos/precioMax" method="GET">
            <?php echo csrf_field(); ?>
            <label>Precio máx: </label>
            <input type="number" name="precioMax" placeholder="Ej: 400">

            <label>Email Especulador: </label>
            <input type="text" name="emailEspeculador" placeholder="">

            <label>
                <input type="checkbox" name="checkbox"> Solo con favoritos
            </label>

            <button type="submit">Filtrar</button>
        </form>
    </section>

    <p><a href="/zulos/create">+ Publicar nuevo zulo</a></p>

    <?php $__currentLoopData = $zulos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $zulo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <main class="zulos">
        <article class="zulo">
            <h3><?php echo e($zulo->titulo); ?></h3>
            <p><strong>Ubicación:</strong> <?php echo e($zulo->ubicacion); ?></p>
            <p><strong>Superficie:</strong> <?php echo e($zulo->superficie); ?> m²</p>
            <p class="precio">Precio: <?php echo e($zulo->precio); ?> / mes</p>
            <p>Contacto: <?php echo e($zulo->especulador->email); ?></p>
            <hr>
            <a href="/zulos/<?php echo e($zulo->id); ?>">Ver más detalles</a>
        </article>
      </main>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

</body>
</html><?php /**PATH C:\Users\franc\Documents\RepoGithub\Ejercicios-Segundo-DAW\ENTORNO SERVIDOR\ExamenLaravel\ExamenFranCas\resources\views/zulos/index.blade.php ENDPATH**/ ?>