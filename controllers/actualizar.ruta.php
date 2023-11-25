<?php
    require_once "../models/ruta.model.php";
    $arrayName = array('fecha'=> $_POST['fecha'],
     'hora_sal'=> $_POST['hora_sal'],
      'precio'=> $_POST['precio'],
      'id'=> $_POST['id']);
      echo json_encode(Ruta::actualizarDato($arrayName));