<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Productos y servicios</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Fecha de Entrada</th>
                    <th>Acciones</th> <!-- New column for actions -->
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr>
                    <td>{{ $producto->Nombre }}</td>
                    <td>{{ $producto->Descripción }}</td>
                    <td>{{ $producto->Precio }}</td>
                    <td>{{ $producto->Stock }}</td>
                    <td>{{ $producto->FechaEntrada }}</td>
                    <td>
                    <a href="{{ route('productosservicios.edit', $producto->id) }}" class="btn btn-primary">Editar</a>
                    <form action="{{ route('productosservicios.destroy', $producto->id) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar</button>
</form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('productoservicio.create') }}" class="btn btn-primary">Crear nuevo</a>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
