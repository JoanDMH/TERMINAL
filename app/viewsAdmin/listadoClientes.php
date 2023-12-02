<?php
require_once '../models/ClienteModel.php';

$clienteModel = new ClienteModel();
$clientes = $clienteModel->listarClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        a {
            text-decoration: none;
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border-radius: 3px;
        }

        a:hover {
            background-color: #0056b3;
        }

        .add-button {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h1>Listado de Clientes</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Edad</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['id_cli']; ?></td>
                <td><?php echo $cliente['nomb_cli']; ?></td>
                <td><?php echo $cliente['ape_cli']; ?></td>
                <td><?php echo $cliente['edad']; ?></td>
                <td>
                    <a href="../viewsAdmin/editar.php?id=<?php echo $cliente['id_cli']; ?>">Editar</a>
                    <a href="../viewsAdmin/eliminar.php?id=<?php echo $cliente['id_cli']; ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <div class="add-button">
        <a href="../viewsAdmin/index.php">Regresar</a>
    </div>
</body>
</html>