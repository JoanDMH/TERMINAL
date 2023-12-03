<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../config/connection.php';
    require_once 'RutaModel.php';

    $db = Connection::getConnection();
    $rutaModel = new RutaModel($db);

    $fecha = $_POST['fecha'];
    $hora_sal = $_POST['hora_sal'];
    $precio = $_POST['precio'];
    $id_ciud_origen = $_POST['id_ciud_origen'];
    $id_ciud_destino = $_POST['id_ciud_destino'];

    if ($rutaModel->insertRuta($fecha, $hora_sal, $precio, $id_ciud_origen, $id_ciud_destino)) {
        echo "Ruta insertada exitosamente.";
    } else {
        echo "Error al insertar la ruta.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Ruta</title>
</head>
<body>
    <h1>Insertar Ruta</h1>
    <form action="insertar.php" method="post">
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" required><br>

        <label for="hora_sal">Hora de Salida:</label>
        <input type="time" name="hora_sal" required><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" required><br>

        <label for="id_ciud_origen">Ciudad Origen:</label>
        <input type="number" name="id_ciud_origen" required><br>

        <label for="id_ciud_destino">Ciudad Destino:</label>
        <input type="number" name="id_ciud_destino" required><br>

        <input type="submit" value="Insertar Ruta">
    </form>
</body>
</html>
