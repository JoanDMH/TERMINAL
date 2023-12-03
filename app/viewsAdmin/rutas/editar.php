<?php
require_once '../../config/connection.php';
require_once 'RutaModel.php';

// Obtener la información de la ruta a editar desde la base de datos
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_ruta'])) {
    $db = Connection::getConnection();
    $rutaModel = new RutaModel($db);

    $id_ruta = $_GET['id_ruta'];
    $ruta = $rutaModel->getRutaById($id_ruta);

    if (!$ruta) {
        die("Ruta no encontrada");
    }

    // Obtener la lista de ciudades
    $ciudades = $rutaModel->getAllCiudades();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Procesar el formulario de edición
    $db = Connection::getConnection();
    $rutaModel = new RutaModel($db);

    $id_ruta = $_POST['id_ruta'];
    $fecha = $_POST['fecha'];
    $hora_sal = $_POST['hora_sal'];
    $precio = $_POST['precio'];
    $id_ciud_origen = $_POST['id_ciud_origen'];
    $id_ciud_destino = $_POST['id_ciud_destino'];

    // Lógica para actualizar la ruta en la base de datos
    if ($rutaModel->updateRuta($id_ruta, $fecha, $hora_sal, $precio, $id_ciud_origen, $id_ciud_destino)) {
        header("Location: index.php"); // Redirige a index.php después de la edición exitosa
        exit();
    } else {
        echo "Error al actualizar la ruta.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ruta</title>
</head>
<body>
    <h1>Editar Ruta</h1>

    <!-- Formulario para editar la ruta -->
    <form action="editar.php" method="post">
        <input type="hidden" name="id_ruta" value="<?php echo $ruta['id_ruta']; ?>">
        
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo $ruta['fecha']; ?>" required><br>

        <label for="hora_sal">Hora de Salida:</label>
        <input type="time" name="hora_sal" value="<?php echo $ruta['hora_sal']; ?>" required><br>

        <label for="precio">Precio:</label>
        <input type="number" name="precio" value="<?php echo $ruta['precio']; ?>" required><br>

        <label for="id_ciud_origen">Ciudad Origen:</label>
        <select name="id_ciud_origen" required>
            <?php foreach ($ciudades as $ciudad) : ?>
                <option value="<?php echo $ciudad['id_ciud']; ?>" <?php echo ($ciudad['id_ciud'] == $ruta['id_ciud_origen']) ? 'selected' : ''; ?>><?php echo $ciudad['nomb_ciud']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <label for="id_ciud_destino">Ciudad Destino:</label>
        <select name="id_ciud_destino" required>
            <?php foreach ($ciudades as $ciudad) : ?>
                <option value="<?php echo $ciudad['id_ciud']; ?>" <?php echo ($ciudad['id_ciud'] == $ruta['id_ciud_destino']) ? 'selected' : ''; ?>><?php echo $ciudad['nomb_ciud']; ?></option>
            <?php endforeach; ?>
        </select><br>

        <input type="submit" value="Actualizar Ruta">
    </form>

    <!-- Agregar un enlace para volver a index.php -->
    <a href="index.php">Volver a la lista de rutas</a>
</body>
</html>


