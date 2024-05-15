<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        h2 {
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 80%;
            margin: 20px auto;
        }

        label {
            font-weight: bold;
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }

        .btn:hover {
            background-color: #45a049;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        ul li {
            color: #ff0000;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <h2>Crear una venta</h2>
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif
    </div>

    <form method="post" action="{{route('venta.update',['venta'=>$venta])}}">
        @csrf
        @method('put')
        <div>
            <label>Nombre</label>
            <input type="text" name="nombre" placeholder="Introduce Nombre" value="{{$venta->nombre}}">
        </div>
        <div>
            <label>Detalles</label>
            <input type="text" name="detalles" placeholder="Introduce detalles" value="{{$venta->detalles}}">
        </div>
        <div>
            <label>Servicios Ofrecidos</label>
            <input type="text" name="servicios_ofrecidos" placeholder="Introduce Servicios Ofrecidos" value="{{$venta->servicios_ofrecidos}}">
        </div>
        <div>
            <label>Precio</label>
            <input type="text" name="precio" placeholder="Introduce precio" value="{{$venta->precio}}">
        </div>
        <div>
            <label>Plazo</label>
            <input type="date" name="plazo" placeholder="Introduce plazo" value="{{$venta->plazo}}">
        </div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</body>
</html>
