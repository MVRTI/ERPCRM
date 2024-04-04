<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <form action="#">
            <form action="{{ route('clientes.filtrarclientes') }}" method="GET">
                <label for="filtros">Filtros</label>
                <select name="filtros" id="filtros">
                    <option value="sinfiltros">Sin Filtros</option>
                    <option value="poblacion">Poblacion</option>
                    <option value="Alta">Alta</option>
                    <option value="Baja">Baja</option>
                </select>
                
                <div id="poblacionInput" style="display: none;">
                    <label for="poblacionText">Introduce tu poblacion</label>
                    <input type="text" id="poblacionText" name="poblacionText">
                </div>
            </form>
        </form>
        <h2>Listado de Clientes</h2>
        @if($clientes->isEmpty())
            <p>No hay clientes registrados.</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->Nombre }}</td>
                    <td>{{ $cliente->Apellido }}</td>
                    <td>{{ $cliente->Email }}</td>
                    <td>{{ $cliente->Teléfono }}</td>
                    <td>{{ $cliente->Dirección }}</td>
                    <td>
                        <form action="{{ route('clientes.cambiarEstado', $cliente) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="estado" onchange="this.form.submit()">
                                <option value="Alta" {{ $cliente->Estado == 'Alta' ? 'selected' : '' }}>Alta</option>
                                <option value="Baja" {{ $cliente->Estado == 'Baja' ? 'selected' : '' }}>Baja</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <script>
        document.getElementById("filtros").addEventListener("change", function() {
            var poblacionInput = document.getElementById("poblacionInput");
            if (this.value === "poblacion") {
                poblacionInput.style.display = "block";
            } else {
                poblacionInput.style.display = "none";
            }
        });
    </script>
</body>
</html>