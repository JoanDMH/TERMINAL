<?php
    require_once "../models/ruta.model.php";
    echo json_encode(Ruta::borrarDato($_POST['id_ruta']));