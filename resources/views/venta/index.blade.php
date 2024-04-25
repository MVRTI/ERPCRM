<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propuesta</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@0;1&display=swap');
        .container-wrapper {
            border-radius: 25px;
            border: 5px solid #4262B5;
            padding: 20px; 
        }

        .estado-pendiente {
            color: orange; 
        }

        .estado-aceptada {
            color: green; 
        }

        .estado-rechazada {
            color: red; 
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

   
        .table-container {
            margin-bottom: 20px;
        }

        .margin {
            margin: 10px;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
        
        <a href="{{ route('venta.create') }}" class="font btn btn-primary buttonblue">Crear nuevo</a>
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>

    <br>
    <div class="container-wrapper font margin">
        <!-- Primera tabla -->
        <div class="table-container">
            <table class="table">
            <div class="col-6">
                <h2 class="font px40 bold">Propuestas de Venta</h2>
            </div>
                <thead>
                <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th>Servicios Ofrecidos</th>
                <th>Precio</th>
                <th>Plazo</th>
                <th>Estado</th>
                <th>Editar</th>
                <th>Eliminar</th>
                <th>Aceptar/Rechazar</th>
                </thead>
            
                <tbody>
                    @foreach($ventas as $venta)
                    @if($venta->estado === 'Pendiente')
                    <tr>
    <td>{{ $venta->id }}</td>
    <td>{{ $venta->nombre }}</td>
    <td>{{ $venta->detalles }}</td>
    <td>{{ $venta->servicios_ofrecidos }}</td>
    <td>{{ $venta->precio }}</td>
    <td>{{ $venta->plazo }}</td>
    <td class="@if($venta->estado == 'Pendiente') estado-pendiente @elseif($venta->estado == 'Aceptada') estado-aceptada @else estado-rechazada @endif">{{ $venta->estado }}</td>
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
    <td>
        <form method="post" action="{{ route('venta.aceptar', ['venta' => $venta]) }}">
            @csrf
            <button type="submit" class="btn btn-success">Aceptar</button>
        </form>
    </td>
    <td>
        <form method="post" action="{{ route('venta.rechazar', ['venta' => $venta]) }}">
            @csrf
            <button type="submit" class="btn btn-danger">Rechazar</button>
        </form>
    </td>
</tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Segunda tabla -->
    @if($ventasAceptadas->isNotEmpty())
    <div class="container-wrapper font margin">
        <div class="table-container">
            <h2 class="font px40 bold">Propuestas Aceptadas</h2>
            <table class="table">
            <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Detalles</th>
                        <th>Servicios Ofrecidos</th>
                        <th>Precio</th>
                        <th>Plazo</th>
                        <th>Estado</th>
                 
                    </tr>
                </thead>
                <tbody>
                    @foreach($ventasAceptadas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->nombre }}</td>
                        <td>{{ $venta->detalles }}</td>
                        <td>{{ $venta->servicios_ofrecidos }}</td>
                        <td>{{ $venta->precio }}</td>
                        <td>{{ $venta->plazo }}</td>
                        <td class="estado-aceptada">{{ $venta->estado }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>    
    @endif


    @if($ventasRechazadas->isNotEmpty())
    <div class="container-wrapper font margin">
        <div class="table-container">
            <h2 class="font px40 bold">Propuestas Rechazadas</h2>
            <table class="table">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Detalles</th>
                <th>Servicios Ofrecidos</th>
                <th>Precio</th>
                <th>Plazo</th>
                <th>Estado</th>
          
            </tr>
        </thead>
        <tbody>
            
            @foreach($ventasRechazadas as $venta)
                <tr>
                    <td>{{ $venta->id }}</td>
                    <td>{{ $venta->nombre }}</td>
                    <td>{{ $venta->detalles }}</td>
                    <td>{{ $venta->servicios_ofrecidos }}</td>
                    <td>{{ $venta->precio }}</td>
                    <td>{{ $venta->plazo }}</td>
                    <td class="estado-rechazada">{{ $venta->estado }}</td>
                  
                </tr>
            @endforeach
        </tbody>
            </table>
        </div>
    </div>
    @endif

</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
