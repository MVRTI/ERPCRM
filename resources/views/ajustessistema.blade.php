<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajustes</title>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 20px;
            height: 100%;
        }

        .header {
            width: 100%;
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .btn-container {
            display: flex;
            width: 100%;
            justify-content: center;
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
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
        }

        .btn-success {
            background-color: #28a745;
            color: white;
        }

        .options-column {
            width: 15%;
            padding-right: 20px;
            border-right: 1px solid #ddd;
        }

        .users-config {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 85%;
        }

    </style>
</head>
<body>

<div class="header">
    <h1>Ajustes</h1>
</div>

<div class="btn-container">
    <table class="options-column">
        <thead>
            <tr>
                <th>Opciones</th>
            </tr>
        </thead>
        <tbody>
            <tr style="cursor:pointer;">
                <td>General</td>
            </tr>
        </tbody>
    </table>

    <div class="users-config">
        <h2>Usuarios</h2>
        <a href="{{ route('usuarios.index') }}" class="btn btn-primary">Configurar Usuarios</a>
    </div>
</div>

</body>
</html>
