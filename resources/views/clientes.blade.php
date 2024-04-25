<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
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

    <div class="container mt-5">
        <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
            
        <div class="row">
            <div class="col-6">
                <h2 class="font px40 bold">Listado de Clientes</h2>
            </div>
            <div class="col-6 text-end">
                <a href="{{ route('clientgenerator') }}" class="font btn btn-primary buttonblue">Generar Cliente</a>
            </div>
        </div>
        <br>
        <div class="container-wrapper font">

            <form action="{{ route('clientes.filtrarclientes') }}" method="GET">
                <label for="filtros">Filtros</label>
                <select name="filtros" id="filtros">
                    <option value="sinfiltros">Sin Filtros</option>
                    <option value="poblacion">Población</option>
                    <option value="Alta">Alta</option>
                    <option value="Baja">Baja</option>
                </select>
                
                <div id="poblacionInput" style="display: none;">
                    <label for="poblacionText">Introduce tu población</label>
                    <input type="text" id="poblacionText" name="poblacionText">
                </div>
                
                <button type="submit">Aplicar Filtros</button>
            </form>

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