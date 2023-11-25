<?php
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");

    require_once "./models/ruta.model.php";
    echo json_encode(Ruta::mostrarDatos());
?>