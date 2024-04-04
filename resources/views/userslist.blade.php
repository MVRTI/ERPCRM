
    <style>
        body {
            display: flex;
            flex-direction: column;
            font-size: 20px;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
        }

        .btn-container button {
            margin-left: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            border-spacing: 0;
        }

        th, td {
            padding: 8px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        .btn {
            padding: 6px 12px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            font-size: 20px;
        }

        .btn-primary {
            background-color: #007bff;
            color: white;
            width: flex;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .search-container {
            margin-bottom: 20px;
        }

        .search-container input[type=text] {
            padding: 10px;
            margin-top: 10px;
            font-size: 17px;
            border: none;
            width: 100%;
        }
    </style>
<body>

<div class="header">
    <h1>Usuarios</h1>

    <div class="search-container">
        <p>Total de usuarios: {{ $users->count() }}</p>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Añadir Nuevo Usuario</a>

    </div>
</div>

<input type="text" id="searchInput" placeholder="Buscar usuario..." onkeyup="searchUsers()">


<table id="usersTable">
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
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

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
