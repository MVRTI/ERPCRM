<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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



<form method="post" action ="{{route('venta.update',['venta'=>$venta])}}">
    @csrf
    @method('put')
    <div>
      <label>Nombre</label>
      <input type="text"  name="nombre" placeholder="Introduce Nombre" value="{{$venta->nombre}}">
    </div>

    <div>
      <label>Detalles</label>
      <input type="text"  name="detalles" placeholder="Introduce detalles" value="{{$venta->detalles}}">
    </div>

    <div>
      <label>Servicios Ofrecidos</label>
      <input type="text"  name="servicios_ofrecidos" placeholder="Introduce Servicios Ofrecidos" value="{{$venta->servicios_ofrecidos}}">
    </div>

    <div>
      <label>Precio</label>
      <input type="text"  name="precio" placeholder="Introduce precio"value="{{$venta->precio}}">
    </div>
    <div>
      <label>Plazo</label>
      <input type="date"  name="plazo" placeholder="Introduce plazo"value="{{$venta->plazo}}">
    </div>


    <button type="submit" class="btn btn-primary">Enviar</button>

  </form>
</body>
</html>