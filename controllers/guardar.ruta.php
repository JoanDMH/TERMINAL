<?php
    require_once "../models/ruta.model.php";
    $arrayName = array('fecha'=> $_POST['fecha'],
     'hora_sal'=> $_POST['hora_sal'],
      'precio'=> $_POST['precio']
      
    );

      echo json_encode(Ruta::guardarDato($arrayName));
?>