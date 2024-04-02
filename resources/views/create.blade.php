<!-- resources/views/propuesta/create.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propuesta</title>
</head>
<body>
    <h2>Crear Propuesta</h2>

    <form action="{{ route('propuesta.store') }}" method="POST">
        @csrf

        <label for="nombre_cliente">Nom del client:</label>
        <input type="text" name="nombre_cliente" required>

        <label for="detalle_proyecto">Detall del projecte:</label>
        <textarea name="detalle_proyecto" required></textarea>

        <label for="servicios_ofrecidos">Serveis oferits:</label>
        <input type="text" name="servicios_ofrecidos" required>

        <label for="precio">Preu:</label>
        <input type="number" name="precio" required>

        <label for="plazo">Temps:</label>
        <input type="text" name="plazo" required>

        <button type="submit">Crear Proposta</button>
    </form>
</body>
</html>
