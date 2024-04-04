<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propuesta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .button-container {
            margin: 10px;
        }


        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }

        .delete-form {
            display: inline-block;
        }

        .delete-form input[type="submit"] {
            background-color: transparent;
            color: #007bff;
            border: none;
            cursor: pointer;
            text-decoration: underline;
            padding: 0;
        }

        .delete-form input[type="submit"]:hover {
            text-decoration: none;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Propuestas de Venta</h2>
    @if(session()->has('success'))
    <div class="success">
        {{session('success')}}
    </div>
    @endif

    <div class="button-container">
        <button onclick="window.location='{{route('venta.create')}}'">Crear propuesta</button>
    </div>

    <table>
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
        @foreach($ventas as $venta)
        <tr>
            <td>{{$venta->id}}</td>
            <td>{{$venta->nombre}}</td>
            <td>{{$venta->detalles}}</td>
            <td>{{$venta->servicios_ofrecidos}}</td>
            <td>{{$venta->precio}}</td>
            <td>{{$venta->plazo}}</td>
                    <td>
                      <button onclick="window.location='{{route('venta.edit',['venta'=> $venta])}}'">Edit</button>
                  </td>
                <td>
                  <form class="delete-form" method="post" action="{{route('venta.delete',['venta' => $venta])}}">
                      @csrf
                      @method('delete')
                      <button type="submit" style="color: white; background-color: red; border: none; padding: 8px 12px; border-radius: 4px; width: 70px;">Delete</button>
                  </form>
                </td>



        </tr>
        @endforeach
    </table>
</div>
</body>
</html>
