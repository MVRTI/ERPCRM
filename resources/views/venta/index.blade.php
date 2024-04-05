<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propuesta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    <a href="{{ route('venta.create') }}" class="btn btn-primary">Crear propuesta</a>

    <h2>Propuestas de Venta</h2>

    <div>
        @if(session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th>Servicios Ofrecidos</th>
                <th>Precio</th>
                <th>Plazo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->nombre }}</td>
                    <td>{{ $venta->detalles }}</td>
                    <td>{{ $venta->servicios_ofrecidos }}</td>
                    <td>{{ $venta->precio }}</td>
                    <td>{{ $venta->plazo }}</td>
                    <td>
                        <a href="{{ route('venta.edit',['venta'=> $venta]) }}" class="btn btn-info">Editar</a>
                    </td>
                    <td>
                        <form method="post" action="{{ route('venta.delete',['venta' => $venta]) }}">
                            @csrf
                            @method('delete')  
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

</body>
</html>
