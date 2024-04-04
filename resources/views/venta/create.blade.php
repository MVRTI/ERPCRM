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



<form method="post" action ="{{route('venta.store')}}">
    @csrf
    @method('post')
    <div>
      <label>Nombre</label>
      <input type="text"  name="nombre" placeholder="Introduce Nombre">
    </div>

    <div>
      <label>Detalles</label>
      <input type="text"  name="detalles" placeholder="Introduce detalles">
    </div>

    <div>
      <label>Servicios Ofrecidos</label>
      <input type="text"  name="servicios_ofrecidos" placeholder="Introduce Servicios Ofrecidos">
    </div>

    <div>
      <label>Precio</label>
      <input type="text"  name="precio" placeholder="Introduce precio">
    </div>
    <div>
      <label>Plazo</label>
      <input type="date"  name="plazo" placeholder="Introduce plazo">
    </div>


    <button type="submit" class="btn btn-primary">Enviar</button>

  </form>
</body>
</html>