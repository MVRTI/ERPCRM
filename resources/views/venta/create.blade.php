<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear una venta</title>
    <!-- Agrega el enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h2>Crear una venta</h2>
<div>
    <!-- Muestra los errores de validación con estilo de Bootstrap -->
    @if ($errors->any())
        <ul class="list-group">
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

<!-- Formulario para crear una venta -->
<form method="post" action="{{ route('venta.store') }}" class="container">
    @csrf
    @method('post')
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduce Nombre">
    </div>

    <div class="mb-3">
        <label for="detalles" class="form-label">Detalles</label>
        <input type="text" class="form-control" id="detalles" name="detalles" placeholder="Introduce detalles">
    </div>
    <div class="mb-3">
        <label for="servicios_ofrecidos" class="form-label">Servicios Ofrecidos</label>
        <input type="text" class="form-control" id="servicios_ofrecidos" name="servicios_ofrecidos" placeholder="Introduce Servicios Ofrecidos">
    </div>
    <div class="mb-3">
        <label for="precio" class="form-label">Precio</label>
        <input type="text" class="form-control" id="precio" name="precio" placeholder="Introduce precio">
    </div>
    <div class="mb-3">
        <label for="plazo" class="form-label">Plazo</label>
        <input type="date" class="form-control" id="plazo" name="plazo" placeholder="Introduce plazo">
    </div>
    <input type="hidden" name="estado" value="Pendiente">

    <!-- Contenedor para los productos -->
  <!-- Contenedor para los productos -->
 <!-- Contenedor para los productos -->
@foreach ($productos as $producto)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">{{ $producto->Nombre }}</h5>
            <p class="card-text">Stock disponible: {{ $producto->Stock }}</p>
            <input type="number" class="form-control" id="producto_{{ $producto->id }}" name="productos[{{ $producto->id }}]" min="0" max="{{ $producto->stock }}">
        </div>
    </div>
@endforeach




    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</body>
</html>