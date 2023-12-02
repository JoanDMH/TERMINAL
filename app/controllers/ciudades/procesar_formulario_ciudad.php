
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../../models/ciudades/CiudadModel.php';
    
    $nombre = $_POST['nombre'];

    $ciudadModel = new CiudadModel();
    $ciudadModel->insertarCiudad($nombre);

    header("Location: ../../viewsAdmin/ciudades/index_ciudades.php");
} else {
    echo "Método de solicitud no válido.";
}
?>
