<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../models/ciudades/CiudadModel.php';

    $id = $_POST['id'];

    $ciudadModel = new CiudadModel();
    $ciudadModel->eliminarCiudad($id);

    header("Location: ../../viewsAdmin/ciudades/index_ciudades.php");
} else {
    echo "Método de solicitud no válido.";
}
?>
