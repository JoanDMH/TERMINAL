<?php
// editar_conductor.php

require_once '../../config/connection.php';
require_once 'ConductorModel.php';

// Verificar si se proporciona un ID válido en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener información del conductor por ID
    $conductor = ConductorModel::getConductorById($id);

    if (!$conductor) {
        echo "Conductor no encontrado.";
        exit;
    }
} else {
    echo "ID de conductor no proporcionado.";
    exit;
}

// Procesar el formulario de edición cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];

    // Validaciones (puedes agregar más según tus requisitos)

    // Crear un array con los datos actualizados
    $conductorData = array(
        'nombre' => $nombre,
        'apellido' => $apellido,
        'celular' => $celular,
        'correo' => $correo
    );

     // Llamar al método para actualizar conductor en el modelo
     if (ConductorModel::updateConductor($id, $conductorData)) {
        echo "Conductor actualizado exitosamente.";
        // Redirigir a index.php después de 2 segundos
        header("refresh:2;url=index_conductores.php");
        exit;
    } else {
        echo "Error al actualizar conductor.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Conductor</title>
</head>
<body>

<h2>Editar Conductor</h2>

<form method="post" action="editar_conductor.php?id=<?= $id ?>">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?= $conductor['nomb_cond'] ?>" required><br>

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="apellido" value="<?= $conductor['apel_cond'] ?>" required><br>

    <label for="celular">Número de Celular:</label>
    <input type="text" id="celular" name="celular" value="<?= $conductor['cel'] ?>" required><br>

    <label for="correo">Correo Electrónico:</label>
    <input type="email" id="correo" name="correo" value="<?= $conductor['correo'] ?>" required><br>

    <input type="submit" value="Actualizar Conductor">
</form>

</body>
</html>
