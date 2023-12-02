<?php
require_once 'BusesModel.php';
require_once '/home/joan/Escritorio/TerminalVIllavicencio/app/viewsAdmin/transportadora/TransportadoraModel.php';

$transportadorasList = TransportadoraModel::getTransportadorasList();


if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_bus = $_GET["id"];

    // Obtener los detalles del bus por ID
    $bus = BusesModel::getBusById($id_bus);
    

    if (!$bus) {
        echo "Bus no encontrado.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id_bus = $_POST["id_bus"];
    $modelo = $_POST["modelo"];
    $capacidad = $_POST["capacidad"];
    $id_tran = $_POST["id_tran"];

    // Validar datos (agregar validaciones según tus necesidades)

    // Actualizar el bus
    if (BusesModel::updateBus($id_bus, $modelo, $capacidad, $id_tran)) {
        echo "Bus actualizado exitosamente.";
        // Redirigir a la página de lista después de la actualización
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar el bus.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Bus</title>
</head>
<body>

<h2>Editar Bus</h2>

<?php if (isset($bus)): ?>
    <form method="post" action="editar_bus.php">
        <input type="hidden" name="id_bus" value="<?php echo $bus['id_bus']; ?>">

        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $bus['modelo']; ?>" required><br>

        <label for="capacidad">Capacidad:</label>
        <input type="number" name="capacidad" value="<?php echo $bus['capacidad']; ?>" required><br>

        <label for="id_tran">ID Transportadora:</label>
        <select name="id_tran" required>
            <?php
            foreach ($transportadorasList as $transportadora) {
                echo "<option value='{$transportadora['id_tran']}'>{$transportadora['nomb_tran']}</option>";
            }
            ?>
        </select>

        <input type="submit" name="submit" value="Guardar cambios">
    </form>
<?php else: ?>
    <p>Bus no encontrado.</p>
<?php endif; ?>

<a href="ver_buses.php">Cancelar</a>

</body>
</html>
