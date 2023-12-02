<?php
require_once 'ContratoModel.php';

// Verificar si se proporciona un ID de bus y conductor
if (isset($_GET['id_bus']) && isset($_GET['id_cond'])) {
    $id_bus = $_GET['id_bus'];
    $id_cond = $_GET['id_cond'];

    // Obtener los detalles del contrato
    $contrato = ContratoModel::getContratoById($id_bus, $id_cond);

    if (!$contrato) {
        echo "Contrato no encontrado.";
        exit;
    }
} else {
    echo "ID de bus y conductor no proporcionados.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Contrato</title>
</head>
<body>

<h2>Detalles del Contrato</h2>

<table border="1">
    <tr>
        <th>ID Bus</th>
        <th>ID Conductor</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
    </tr>
    <tr>
        <td><?php echo $contrato['id_bus']; ?></td>
        <td><?php echo $contrato['id_cond']; ?></td>
        <td><?php echo $contrato['fecha_ini']; ?></td>
        <td><?php echo $contrato['fecha_fin']; ?></td>
    </tr>
</table>

<br>

<a href="index.php">Volver al Listado de Contratos</a>

</body>
</html>
