<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Usuarios</title>
        <!-- Enlace al archivo CSS de Bootstrap -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
        />
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Josefin+Sans:ital@0;1&display=swap");
            .container-wrapper {
                border-radius: 25px;
                border: 5px solid #4262b5;
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
                background-color: #4262b5;
            }

            .buttonred {
                border-radius: 0px;
                background-color: #b54242;
            }
        </style>
    </head>
    <body>
        <div class="container mt-5">
            
            <a href="{{ route('dashboard') }}" class="btn btn-secondary"
                >Volver al Dashboard</a
            >
            <div class="row">
                <div class="col-6">
                    <h2 class="font px40 bold">Usuarios</h2>
                    <div class="font bold">
                        <p>Total de usuarios: {{ $users->count() }}</p>
                    </div>
                </div>
                <div class="col-6 text-end">
                    <a
                        href="{{ route('users.create') }}"
                        class="font btn btn-primary buttonblue"
                        >Crear nuevo</a
                    >
                </div>
            </div>
            <br />
            <div class="container-wrapper font">
                <table id="usersTable" class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Fecha de Creación</th>
                            <th>Roles</th>
                        </tr>
                    </thead>
                    @foreach($users as $user)
                    <tr
                        style="cursor: pointer"
                        onclick="redirectToUser('{{ $user->id }}')"
                    >
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->role }}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </body>
    <script>
        function redirectToUser(userId) {
            window.location.href = "{{ url('usuarios') }}/" + userId;
        }

        function searchUsers() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("usersTable");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</html>
