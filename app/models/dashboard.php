<?php
session_start();
require_once 'models/clientes/ClienteModel.php';

// Verificar si el cliente está autenticado
if (!isset($_SESSION['cliente_id'])) {
    header('Location: login.php');
    exit();
}

// Obtener información del cliente
$clienteModel = new ClienteModel();
$cliente = $clienteModel->obtenerClientePorId($_SESSION['cliente_id']);

// Mostrar la información del cliente
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Agrega tus encabezados según sea necesario -->
</head>
<body>
    <h1>Bienvenido, <?php echo $cliente['nomb_cli'] . ' ' . $cliente['ape_cli']; ?>!</h1>
    <p>Edad: <?php echo $cliente['edad']; ?></p>
    <!-- Agrega más información del cliente según sea necesario -->
    <a href="cerrar_sesion.php">Cerrar Sesión</a>
</body>
</html>
