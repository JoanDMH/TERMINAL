<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../models/ClienteModel.php';

    $id = $_POST['id'];

    $clienteModel = new ClienteModel();
    $clienteModel->eliminarCliente($id);

    header("Location: ../viewsAdmin/listadoClientes.php");
} else {
    echo "Método de solicitud no válido.";
}
?>