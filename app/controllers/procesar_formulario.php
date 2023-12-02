<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once '../models/ClienteModel.php';
    $id = $_POST["id"];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $edad = $_POST['edad'];

    $clienteModel = new ClienteModel();
    $clienteModel->insertarCliente($id, $nombre, $apellido, $edad);

    header("Location: ../viewsAdmin/listadoClientes.php");
}
?>