<?php
require_once '../../config/connection.php';
require_once 'RutaModel.php';

$db = Connection::getConnection();
$rutaModel = new RutaModel($db);

// Procesar el formulario de inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fecha = $_POST['fecha'];
    $hora_sal = $_POST['hora_sal'];
    $precio = $_POST['precio'];
    // Elimina la siguiente línea relacionada con id_ciud_origen
    $id_ciud_destino = $_POST['id_ciud_destino'];

    if ($rutaModel->insertarRuta($fecha, $hora_sal, $precio, $id_ciud_destino)) {
        echo "Ruta insertada exitosamente.";
    } else {
        echo "Error al insertar la ruta.";
    }
}




$rutas = $rutaModel->getAllRutas();
$ciudades = $rutaModel->getAllCiudades();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal - Sistema de Rutas</title>
</head>
<body>
    <h1>Sistema de Rutas</h1>
    <!--<a href="listado.php">Ver Listado de Rutas</a><br>-->

    

    <!-- Formulario para insertar una ruta -->
<h2>Insertar Nueva Ruta</h2>
<form action="index.php" method="post">
    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" required><br>

    <label for="hora_sal">Hora de Salida:</label>
    <input type="time" name="hora_sal" required><br>

    <label for="precio">Precio:</label>
    <input type="number" name="precio" required><br>

    <label for="id_ciud_destino">Ciudad Destino:</label>
    <select name="id_ciud_destino">
        <?php foreach ($ciudades as $ciudad): ?>
            <option value="<?php echo $ciudad['id_ciud']; ?>"><?php echo $ciudad['nomb_ciud']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Insertar Ruta">
</form>



    

    <!-- Tabla de Rutas -->
    <h2>Listado de Rutas</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora de Salida</th>
            <th>Precio</th>
           
            <th>Ciudad Destino</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($rutas as $ruta): ?>
            <tr>
                <td><?php echo $ruta['id_ruta']; ?></td>
                <td><?php echo $ruta['fecha']; ?></td>
                <td><?php echo $ruta['hora_sal']; ?></td>
                <td><?php echo $ruta['precio']; ?></td>
                <td><?php echo $ruta['id_ciud_destino']; ?></td>
                <td>
                    <a href="editar.php?id_ruta=<?php echo $ruta['id_ruta']; ?>">Editar</a>
                    |
                    <a href="eliminar.php?id_ruta=<?php echo $ruta['id_ruta']; ?>">Borrar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>
</html>
