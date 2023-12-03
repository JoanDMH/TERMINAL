<?php
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/conductores/ConductorModel.php';
require_once 'ContratoModel.php';

// Obtener la lista de conductores sin contrato
$conductoresSinContrato = ConductorModel::getConductoresSinContrato();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Conductores sin Contrato</title>
</head>
<body>

<h2>Reporte de Conductores sin Contrato</h2>

<table border="1">
    <tr>
        <th>ID Conductor</th>
        <th>Nombre del Conductor</th>
        <th>Teléfono</th>
        <th>Correo</th>
    </tr>
    <?php
    foreach ($conductoresSinContrato as $conductor) {
        echo "<tr>";
        echo "<td>{$conductor['id_cond']}</td>";
        echo "<td>{$conductor['nomb_cond']} {$conductor['apel_cond']}</td>";
        echo "<td>{$conductor['cel']}</td>";
        echo "<td>{$conductor['correo']}</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
