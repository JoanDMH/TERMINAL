<?php
    require_once "./app/config/connection.php";
    echo json_encode(Ruta::mostrarDatos());
?>