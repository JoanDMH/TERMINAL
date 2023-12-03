<?php
require_once '../../config/connection.php';
require_once 'RutaModel.php';

// Verificar si se recibió un ID de ruta para borrar
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id_ruta'])) {
    $db = Connection::getConnection();
    $rutaModel = new RutaModel($db);

    $id_ruta = $_GET['id_ruta'];

    // Lógica para borrar la ruta en la base de datos
    if ($rutaModel->eliminarRuta($id_ruta)) {
        header("Location: index.php"); // Redirige a index.php después de la eliminación exitosa
        exit();
    } else {
        echo "Error al eliminar la ruta.";
    }
} else {
    // Si no se proporciona un ID de ruta, mostrar un mensaje de error
    echo json_encode(["error" => "Método no permitido"]);
}
?>


