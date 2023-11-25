<?php
    require_once "../models/ruta.model.php";
    $arrayName = array('fecha'=> $_POST['fecha'],
     'hora_sal'=> $_POST['hora_sal'],
      'precio'=> $_POST['precio'],
      'origen_ciudad'=> $_POST['origen_ciudad'],
      'destino_ciudad'=> $_POST['destino_ciudad']);

      echo json_encode(Ruta::guardarDato($arrayName));
?>