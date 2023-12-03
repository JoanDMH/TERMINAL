<?php
require_once '../../config/connection.php';
require_once 'RutaModel.php';

$db = Connection::getConnection();
$rutaModel = new RutaModel($db);

$rutas = $rutaModel->getAllRutas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Rutas</title>
</head>
<body>
    <h1>Listado de Rutas</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Fecha</th>
            <th>Hora de Salida</th>
            <th>Precio</th>
            <th>Ciudad Origen</th>
            <th>Ciudad Destino</th>
        </tr>
        <?php foreach ($rutas as $ruta): ?>
            <tr>
                <td><?php echo $ruta['id_ruta']; ?></td>
                <td><?php echo $ruta['fecha']; ?></td>
                <td><?php echo $ruta['hora_sal']; ?></td>
                <td><?php echo $ruta['precio']; ?></td>
                <td><?php echo $ruta['id_ciud_origen']; ?></td>
                <td><?php echo $ruta['id_ciud_destino']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
