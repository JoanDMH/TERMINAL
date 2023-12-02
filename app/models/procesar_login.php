<?php
session_start();

require_once 'CuentaClienteModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos del formulario
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Crear instancia del modelo de cuenta cliente
    $cuentaClienteModel = new CuentaClienteModel();

    // Autenticar al cliente
    $cliente = $cuentaClienteModel->autenticarCliente($usuario, $contrasena);

    if ($cliente) {
        // Iniciar sesión y redirigir al área del cliente
        $_SESSION['id_cli'] = $cliente['id_cli'];
        header('Location: area_cliente.php');
        exit();
    } else {
        // Redirigir al formulario de login con un mensaje de error
        header('Location: login.php?error=1');
        exit();
    }
} else {
    // Si no es una solicitud POST, redirigir a la página de login
    header('Location: login.php');
    exit();
}
