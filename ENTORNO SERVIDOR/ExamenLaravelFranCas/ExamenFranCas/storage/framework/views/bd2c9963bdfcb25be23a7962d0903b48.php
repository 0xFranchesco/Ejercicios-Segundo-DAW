<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Fotozulo - Detalle del Zulo</title>
    <style>
        body { font-family: sans-serif; margin: 20px; line-height: 1.6; max-width: 800px; margin: auto; }
        .zulo { border: 1px solid #ccc; padding: 15px; border-radius: 8px; margin-top: 20px; }
        .especulador-info { background: #f4f4f4; padding: 15px; border-radius: 5px; margin: 20px 0; }
        .precio { font-weight: bold; color: #2c3e50; font-size: 1.2em; }
    </style>
</head>
<body>

    <header>
        <h1>Detalles del Zulo</h1>
        <a href="/zulos">&larr; Volver al listado</a>
    </header>
    
    <main class="zulo">
        <article>
            <h2><?php echo e($zulo->titulo); ?></h2>
            <p><strong>Ubicación:</strong> <?php echo e($zulo->ubicacion); ?></p>
            
            <p><strong>Descripción:</strong></p>
            <p><?php echo e($zulo->descripcion); ?></p>
            
            <p><strong>Superficie:</strong> <?php echo e($zulo->superficie); ?> m²</p>
            <p class="precio"><?php echo e($zulo->precio); ?> / mes</p>
        </article>

        <aside class="especulador-info">
            <h3>Datos del Especulador</h3>
            <p><strong>Contacto:</strong> <?php echo e($zulo->especulador->nombre); ?></p>
            <p><strong>Email:</strong> <?php echo e($zulo->especulador->email); ?></p>
            
            <p>
                <a href="/especuladores/<?php echo e($zulo->especulador); ?>/zulos">Ver más zulos de este especulador</a>
            </p>
        </aside>
    </main>

</body>
</html><?php /**PATH C:\Users\franc\Documents\RepoGithub\Ejercicios-Segundo-DAW\ENTORNO SERVIDOR\ExamenLaravel\ExamenFranCas\resources\views/zulos/show.blade.php ENDPATH**/ ?>