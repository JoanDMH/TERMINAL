<?php
// eliminar_conductor.php

require_once '../../config/connection.php';
require_once 'ConductorModel.php';

// Verificar si se proporciona un ID válido en la URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Llamar al método para eliminar conductor en el modelo
    if (ConductorModel::deleteConductor($id)) {
        echo "Conductor eliminado exitosamente.";
        // Redirigir a index.php después de 2 segundos
        header("refresh:2;url=index_conductores.php");
        exit;
    } else {
        echo "Error al eliminar conductor.";
    }
} else {
    echo "ID de conductor no proporcionado.";
}
?>
s