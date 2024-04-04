<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            margin-top: 10%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            margin-top: 0;
            color: #007bff;
        }

        .user-info {
            margin-bottom: 20px;
        }

        .user-info p {
            margin: 10px 0;
            font-size: 18px;
        }

        .user-info input[type="text"] {
            width: 100%;
            padding: 5px;
            font-size: 18px;
        }

        strong {
            font-weight: bold;
        }

        .btn {
            padding: 8px 16px;
            font-size: 16px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Detalle de Usuario</h1>

    <form action="{{ route('usuarios.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="user-info">
            <label for="name"><strong>Nombre:</strong></label>
            <input type="text" id="name" name="name" value="{{ $user->name }}">
        </div>

        <div class="user-info">
            <label for="email"><strong>Correo Electrónico:</strong></label>
            <input type="text" id="email" name="email" value="{{ $user->email }}">
        </div>

        <div class="user-info">
            <label><strong>Fecha de creación:</strong></label>
            <p>{{ $user->created_at }}</p>
        </div>

        <div class="user-info">
            <label><strong>Rol:</strong></label>
            <select name="role">
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
            </select>
        </div>

        <button type="submit" class="btn">Guardar cambios</button>
    </form>

        <hr>

    <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este usuario?')">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>

</div>

<script>
    function confirmDelete() {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            document.getElementById('deleteUserForm').submit();
        }
    }
</script>

</body>
</html>
