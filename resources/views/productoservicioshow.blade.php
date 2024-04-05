<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@0;1&display=swap');
        .container-wrapper {
            border-radius: 25px;
            border: 5px solid #4262B5;
            padding: 20px; /* Adjust padding as needed */
        }

        .font {
            font-family: "Josefin Sans";
        }

        .bold {
            font-weight: bold;
        }

        .px40 {
            font-size: 40px;
        }

        .px5padding {
            padding-left: 5px;
            padding-right: 5px;
        }
        
        .buttonblue {
            border-radius: 0px;
            background-color: #4262B5;
        }

        .buttonred {
            border-radius: 0px;
            background-color: #b54242;
        }


    </style>
</head>
<body>
    <div class="container mt-5">
    <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
        <div class="row">
            <div class="col-6">
                <h2 class="font px40 bold">Productos y servicios</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('productoservicio.create') }}" class="font btn btn-primary buttonblue">Crear nuevo</a>
            </div>
        </div>
        <br>
        <div class="container-wrapper font">

            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha de Entrada</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                    @foreach($productos as $producto)
                    <tr>
                        <td>{{ $producto->Nombre }}</td>
                        <td>{{ $producto->Descripción }}</td>
                        <td>{{ $producto->Precio }}</td>
                        <td>{{ $producto->Stock }}</td>
                        <td>{{ $producto->FechaEntrada }}</td>
                        <td>
                            <a href="{{ route('productosservicios.edit', $producto->id) }}" class="btn btn-primary buttonblue">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('productosservicios.destroy', $producto->id) }}" method="POST">
                                <button type="submit" class="btn btn-danger buttonred">Eliminar</button>
                            </form>
                        </td>
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
