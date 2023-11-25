<?php
    require_once "../models/ruta.model.php";
    $arrayName = array('fecha'=> $_POST['fecha'],
     'hora_sal'=> $_POST['hora_sal'],
      'precio'=> $_POST['precio'],
      //'origen_ciudad'=> $_POST['origen_ciudad'],
      //'destino_ciudad'=> $_POST['destino_ciudad'],
      'id'=> $_POST['id']);
      echo json_encode(Ruta::actualizarDato($arrayName));