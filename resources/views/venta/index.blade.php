<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Propuesta</title>
    
</head>
<body>
    
<div class="container">
  <h2>Propuestas de Venta</h2>
      
      <div>
        @if(session()->has('success'))
        <div>
          {{session('success')}}
        </div>
        @endif
        </div>
    <div>

    <div>

    <a href="{{route('venta.create')}}">Crear propuesta</a>


    </div>


      <table border="1">
        <tr>
          <td>Id</td>
          <td>Nombre</td>
          <td>Detalles</td>
          <td>Servicios Ofrecidos</td>
          <td>Precio</td>
          <td>Plazo</td>
          <td>Editar</td>
          <td>Eliminar</td>
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
            <a href="{{route('venta.edit',['venta'=> $venta])}}">Edit</a>
          </td>


          <td>
              <form method ="post" action="{{route('venta.delete',['venta' => $venta])}}">
                  @csrf
                  @method('delete')  
                  <input type ="submit" value="Delete"/>
              </form>
          </td>

            </tr>
        @endforeach
      </table>


  
</div>
        

</body>
</html>
