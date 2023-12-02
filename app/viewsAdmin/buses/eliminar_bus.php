<?php
require_once 'BusesModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_bus = $_GET["id"];

    // Obtener los detalles del bus por ID
    $bus = BusesModel::getBusById($id_bus);

    if (!$bus) {
        echo "Bus no encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmar"])) {
    $id_bus = $_POST["id_bus"];

    // Eliminar el bus
    if (BusesModel::deleteBus($id_bus)) {
        echo "Bus eliminado exitosamente.";
        // Redirigir a la página de lista después de la eliminación
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar el bus.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Bus</title>
</head>
<body>

<h2>Eliminar Bus</h2>

<?php if (isset($bus)): ?>
    <p>¿Estás seguro de que deseas eliminar el bus "<?php echo $bus['modelo']; ?>"?</p>

    <form method="post" action="eliminar_bus.php">
        <input type="hidden" name="id_bus" value="<?php echo $bus['id_bus']; ?>">
        <input type="submit" name="confirmar" value="Sí, eliminar">
    </form>
<?php else: ?>
    <p>Bus no encontrado.</p>
<?php endif; ?>

<a href="ver_buses.php">Cancelar</a>

</body>
</html>
