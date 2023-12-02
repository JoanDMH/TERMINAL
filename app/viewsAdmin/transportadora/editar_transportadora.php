<?php
require_once 'TransportadoraModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id_tran = $_GET["id"];

    // Obtener los detalles de la transportadora por ID
    $transportadora = TransportadoraModel::getTransportadoraById($id_tran);

    if (!$transportadora) {
        echo "Transportadora no encontrada.";
        exit;
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id_tran = $_POST["id_tran"];
    $nomb_tran = $_POST["nomb_tran"];
    $dire_tran = $_POST["dire_tran"];
    $cel = $_POST["cel"];
    $correo = $_POST["correo"];

    // Validar datos (agregar validaciones según tus necesidades)

    // Actualizar la transportadora
    if (TransportadoraModel::updateTransportadora($id_tran, $nomb_tran, $dire_tran, $cel, $correo)) {
        echo "Transportadora actualizada exitosamente.";
        // Redirigir a la página de lista después de la actualización
        header("Location: index.php");
        exit();
    } else {
        echo "Error al actualizar la transportadora.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Transportadora</title>
</head>
<body>

<h2>Editar Transportadora</h2>

<?php if (isset($transportadora)): ?>
    <form method="post" action="editar_transportadora.php">
        <input type="hidden" name="id_tran" value="<?php echo $transportadora['id_tran']; ?>">

        <label for="nomb_tran">Nombre:</label>
        <input type="text" name="nomb_tran" value="<?php echo $transportadora['nomb_tran']; ?>" required><br>

        <label for="dire_tran">Dirección:</label>
        <input type="text" name="dire_tran" value="<?php echo $transportadora['dire_tran']; ?>" required><br>

        <label for="cel">Teléfono:</label>
        <input type="text" name="cel" value="<?php echo $transportadora['cel']; ?>" required><br>

        <label for="correo">Correo:</label>
        <input type="email" name="correo" value="<?php echo $transportadora['correo']; ?>" required><br>

        <input type="submit" name="submit" value="Guardar cambios">
    </form>
<?php else: ?>
    <p>Transportadora no encontrada.</p>
<?php endif; ?>

<a href="ver_transportadora.php">Cancelar</a>

</body>
</html>

