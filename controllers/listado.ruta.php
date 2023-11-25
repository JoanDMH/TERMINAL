<?php
    require_once "../models/ruta.model.php";
    echo json_encode(Ruta::mostrarDatos());
?>