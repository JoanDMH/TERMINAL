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

// Procesar la eliminación del contrato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmar"])) {
    // Eliminar el contrato
    if (ContratoModel::deleteContrato($id_bus, $id_cond)) {
        echo "Contrato eliminado exitosamente.";
        // Redirigir a la página de lista después de la eliminación
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el contrato.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Contrato</title>
</head>
<body>

<h2>Eliminar Contrato</h2>

<p>¿Estás seguro de que deseas eliminar el contrato?</p>

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

<form method="post" action="eliminar_contrato.php?id_bus=<?php echo $id_bus; ?>&id_cond=<?php echo $id_cond; ?>">
    <input type="submit" name="confirmar" value="Confirmar Eliminación">
</form>

<br>

<a href="index.php">Cancelar</a>

</body>
</html>
