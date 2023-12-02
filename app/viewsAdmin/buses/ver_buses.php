<?php
require_once 'BusesModel.php';

// Mostrar la lista de buses
$buses = BusesModel::getBuses();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Buses</title>
</head>
<body>

<h2>Listado de Buses</h2>
<table border="1">
    <tr>
        <th>ID Bus</th>
        <th>Modelo</th>
        <th>Capacidad</th>
        <th>ID Transportadora</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach ($buses as $bus) {
        echo "<tr>";
        echo "<td>{$bus['id_bus']}</td>";
        echo "<td>{$bus['modelo']}</td>";
        echo "<td>{$bus['capacidad']}</td>";
        echo "<td>{$bus['id_tran']}</td>";
        echo "<td>";
        echo "<a href='editar_bus.php?id={$bus['id_bus']}'>Editar</a> | ";
        echo "<a href='eliminar_bus.php?id={$bus['id_bus']}'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
