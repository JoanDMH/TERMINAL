<?php
require_once 'Connection.php';

// Realiza la conexión a la base de datos
$connection = Connection::getConnection();

// Verifica la conexión
if (!$connection) {
    die("Error en la conexión a la base de datos.");
}

// Consulta para obtener los detalles de contratos desde la vista
$query = "SELECT * FROM detalles_contratos";
$result = $connection->query($query);

// Procesa e imprime la información de la vista
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Contratos</title>
</head>
<body>

<h2>Detalles de Contratos</h2>

<table border="1">
    <tr>
        <th>ID Bus</th>
        <th>ID Conductor</th>
        <th>Nombre del Conductor</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
        <th>Modelo del Bus</th>
        <th>Capacidad del Bus</th>
        <th>Nombre de la Transportadora</th>
    </tr>
    <?php
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>";
        echo "<td>{$row['id_bus']}</td>";
        echo "<td>{$row['id_cond']}</td>";
        echo "<td>{$row['nombre_conductor']}</td>";
        echo "<td>{$row['fecha_ini']}</td>";
        echo "<td>{$row['fecha_fin']}</td>";
        echo "<td>{$row['modelo_bus']}</td>";
        echo "<td>{$row['capacidad_bus']}</td>";
        echo "<td>{$row['nombre_transportadora']}</td>";
        echo "</tr>";
    }
    ?>
</table>

<br>

<a href="index.php">Volver al Listado de Contratos</a>

</body>
</html>
