<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../config/connection.php';
    require_once 'RutaModel.php';

    $db = Connection::getConnection();
    $rutaModel = new RutaModel($db);

    $id_ruta = $_POST['id_ruta'];
    $fecha = $_POST['fecha'];
    $hora_sal = $_POST['hora_sal'];
    $precio = $_POST['precio'];
    $id_ciud_origen = $_POST['id_ciud_origen'];
    $id_ciud_destino = $_POST['id_ciud_destino'];

    if ($rutaModel->updateRuta($id_ruta, $fecha, $hora_sal, $precio, $id_ciud_origen, $id_ciud_destino)) {
        echo "Ruta actualizada exitosamente.";
    } else {
        echo "Error al actualizar la ruta.";
    }
}

// Obtener la información de la ruta para prellenar el formulario de edición
if (isset($_GET['id_ruta'])) {
    $id_ruta = $_GET['id_ruta'];
    $ruta = $rutaModel->getRutaById($id_ruta);
} else {
    // Redirigir a la página de listado si no se proporciona un ID válido
    header("Location: listado.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Ruta</title>
</head>
<body>
    <h1>Actualizar Ruta</h1>
    <form action="actualizar.php" method="post">
        <input type="hidden" name="id_ruta" value="<?php echo $ruta['id_ruta']; ?>">

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $ruta['fecha']; ?>" required><br>

        <label for="hora_sal">Hora de Salida:</label>
        <input type="time" name="hora_sal" value="<?php echo $ruta['hora_sal']; ?>" required><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?php echo $ruta['precio']; ?>" required><br>

        <label for="id_ciud_origen">Ciudad Origen:</label>
        <input type="number" name="id_ciud_origen" value="<?php echo $ruta['id_ciud_origen']; ?>" required><br>

        <label for="id_ciud_destino">Ciudad Destino:</label>
        <input type="number" name="id_ciud_destino" value="<?php echo $ruta['id_ciud_destino']; ?>" required><br>

        <input type="submit" value="Actualizar Ruta">
    </form>
</body>
</html>
