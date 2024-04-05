<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <!-- Enlace al archivo CSS de Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
            <a href="{{ route('users.create') }}" class="btn btn-primary">Añadir Nuevo Usuario</a>
            <a href="{{ route('dashboard') }}" class="btn btn-secondary">Volver al Dashboard</a>
    <div class="header">
        <h1>Usuarios</h1>

        <div class="search-container">
            <p>Total de usuarios: {{ $users->count() }}</p>
            
        </div>
    </div>

    <input type="text" id="searchInput" class="form-control" placeholder="Buscar usuario..." onkeyup="searchUsers()">

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
        <tbody>
            @foreach($users as $user)
                <tr style="cursor:pointer;" onclick="redirectToUser('{{ $user->id }}')">
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->role }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

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
</body>
</html>
