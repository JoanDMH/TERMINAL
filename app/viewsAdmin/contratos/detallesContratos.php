<?php
require_once 'ContratoModel.php';
require_once '/home/joan/Escritorio/TerminalVIllavicencio/app/viewsAdmin/transportadora/TransportadoraModel.php';


// Obtener la lista de contratos actuales de los conductores
$contratosActuales = ContratoModel::getContratosActuales();

// Procesar e imprimir el informe
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de Contratos</title>
</head>
<body>

<h2>Detalles de Contratos Actuales</h2>

<table border="1">
    <tr>
        <th>ID Bus</th>
        <th>ID Conductor</th>
        <th>Nombre del Conductor</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
    </tr>
    <?php
    foreach ($contratosActuales as $contrato) {
        $conductor = ConductorModel::getConductorById($contrato['id_cond']);
        echo "<tr>";
        echo "<td>{$contrato['id_bus']}</td>";
        echo "<td>{$contrato['id_cond']}</td>";
        echo "<td>{$conductor['nomb_cond']} {$conductor['apel_cond']}</td>";
        echo "<td>{$contrato['fecha_ini']}</td>";
        echo "<td>{$contrato['fecha_fin']}</td>";
        echo "</tr>";
    }
    ?>
</table>

<br>

<a href="index.php">Volver al Listado de Contratos</a>

</body>
</html>
