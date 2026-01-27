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
        <form action="#" method="GET">
            @csrf
            <label>Precio máx: </label>
            <input type="number" name="" placeholder="Ej: 400">

            <label>Email Especulador: </label>
            <input type="text" name="" placeholder="">

            <label>
                <input type="checkbox" name=""> Solo con favoritos
            </label>

            <button type="submit">Filtrar</button>
        </form>
    </section>

    <p><a href="#">+ Publicar nuevo zulo</a></p>

    @foreach($zulos as $zulo)
    <main class="zulos">
        <article class="zulo">
            <h3>{{ $zulo->titulo }}</h3>
            <p><strong>Ubicación:</strong> {{ $zulo->ubicacion }}</p>
            <p><strong>Superficie:</strong> {{ $zulo->superficie }} m²</p>
            <p class="precio">Precio: {{ $zulo->precio }} / mes</p>
            <p>Contacto: {{ $zulo->especulador->email }}</p>
            <hr>
            <a href="/zulos/{{ $zulo->id }}">Ver más detalles</a>
        </article>
      </main>

    @endforeach

</body>
</html>