<?php
require_once '../../models/ciudades/CiudadModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $ciudadModel = new CiudadModel();
    $ciudad = $ciudadModel->obtenerCiudadPorId($id);

    if ($ciudad) {
        // Mostrar el formulario de edición
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Agrega tus estilos CSS si es necesario -->
    <meta charset="UTF-8">
    <title>Editar Ciudad</title>
</head>
<body>
    <h1>Editar Ciudad</h1>
    <form action="../../controllers/ciudades/procesar_editar_ciudad.php" method="post">
        <input type="hidden" name="id" value="<?php echo $ciudad['id_ciud']; ?>">
        <label for="nombre">Nombre de la Ciudad:</label>
        <input type="text" name="nombre" value="<?php echo $ciudad['nomb_ciud']; ?>" required>
        <br>
        <input type="submit" value="Guardar Cambios">
    </form>
    <br>
    <a href="index_ciudades.php">Volver al Listado de Ciudades</a>
</body>
</html>
<?php
    } else {
        echo "Ciudad no encontrada.";
    }
} else {
    echo "Parámetros no válidos.";
}
?>
