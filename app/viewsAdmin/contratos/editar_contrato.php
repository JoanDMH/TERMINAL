<?php
require_once 'ContratoModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/buses/BusesModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/transportadora/TransportadoraModel.php';



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

// Procesar el formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $fecha_ini = $_POST["fecha_ini"];
    $fecha_fin = $_POST["fecha_fin"];

    // Validar datos (agregar validaciones según tus necesidades)

    // Actualizar el contrato
    if (ContratoModel::updateContrato($id_bus, $id_cond, $fecha_ini, $fecha_fin)) {
        echo "Contrato actualizado exitosamente.";
        // Redirigir a la página de detalles después de la actualización
        header("Location: ver_contratos.php?id_bus={$id_bus}&id_cond={$id_cond}");
        exit();
    } else {
        echo "Error al actualizar el contrato.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contrato</title>
</head>
<body>

<h2>Editar Contrato</h2>

<form method="post" action="editar_contrato.php?id_bus=<?php echo $id_bus; ?>&id_cond=<?php echo $id_cond; ?>">
    <label for="fecha_ini">Fecha de Inicio:</label>
    <input type="date" name="fecha_ini" value="<?php echo $contrato['fecha_ini']; ?>" required><br>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" name="fecha_fin" value="<?php echo $contrato['fecha_fin']; ?>"><br>

    <input type="submit" name="submit" value="Guardar Cambios">
</form>

<br>

<a href="ver_contratos.php?id_bus=<?php echo $id_bus; ?>&id_cond=<?php echo $id_cond; ?>">Volver a Detalles del Contrato</a>

</body>
</html>
