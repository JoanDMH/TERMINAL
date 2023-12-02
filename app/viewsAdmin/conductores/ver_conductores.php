<?php
// ver_conductores.php

require_once '../../config/connection.php';
require_once 'ConductorModel.php';

// Obtener todos los conductores
$conductores = ConductorModel::getAllConductores();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Conductores</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Lista de Conductores</h2>

<!-- Tabla para mostrar los conductores -->
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Celular</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($conductores as $conductor): ?>
            <tr>
                <td><?= $conductor['id_cond'] ?></td>
                <td><?= $conductor['nomb_cond'] ?></td>
                <td><?= $conductor['apel_cond'] ?></td>
                <td><?= $conductor['cel'] ?></td>
                <td><?= $conductor['correo'] ?></td>
                <td>
                    <a href="editar_conductor.php?id=<?= $conductor['id_cond'] ?>">Editar</a>
                    <a href="eliminar_conductor.php?id=<?= $conductor['id_cond'] ?>">Eliminar</a>
                </td>
                
            </tr>
            
        <?php endforeach; ?>
    </tbody><a href="index_conductores.php" class="btn btn-secondary mt-3">Volver</a>
</table>

</body>
</html>

