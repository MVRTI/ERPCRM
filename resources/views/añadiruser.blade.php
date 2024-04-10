<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Nuevo Usuario</title>
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

        .user-info label {
            font-weight: bold;
        }

        .user-info input[type="text"],
        .user-info select {
            width: 100%;
            padding: 5px;
            font-size: 18px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
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

        .btn-danger {
            background-color: #dc3545;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Añadir Nuevo Usuario</h1>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf

        <div class="user-info">
            <label for="name">Nombre:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="user-info">
            <label for="email">Correo Electrónico:</label>
            <input type="text" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="user-info">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="user-info">
            <label for="role">Rol:</label>
            <select name="role" id="role" required>
                <option value="Administrador">Administrador</option>
                <option value="Gestor de Productos">Gestor de Productos</option>
                <option value="Gestor de Ventas">Gestor de Ventas</option>
                <option value="Gestor de Clientes">Gestor de Clientes</option>
            </select>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn">Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
</div>

</body>
</html>
