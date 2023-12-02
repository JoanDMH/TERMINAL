<?php
require_once '../models/ClienteModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $clienteModel = new ClienteModel();
    $cliente = $clienteModel->obtenerClientePorId($id);

    if ($cliente) {
        // Mostrar confirmación de eliminación
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Eliminar Cliente</title>
    </head>
    <body>
        <h1>Eliminar Cliente</h1>
        <p>¿Estás seguro de que quieres eliminar al cliente "<?php echo $cliente['nomb_cli'] . ' ' . $cliente['ape_cli']; ?>"?</p>
        <form action="../controllers/procesar_eliminar.php" method="post">
            <input type="hidden" name="id" value="<?php echo $cliente['id_cli']; ?>">
            <input type="submit" value="Eliminar">
        </form>
        <br>
        <a href="crudClientes/views/listado.php">Cancelar</a>
    </body>
    </html>
    <?php
    } else {
        echo "Cliente no encontrado.";
    }
} else {
    echo "Parámetros no válidos.";
}
?>