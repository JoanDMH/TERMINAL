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
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["confirmar"])) {
    $id_tran = $_POST["id_tran"];

    // Eliminar la transportadora
    if (TransportadoraModel::deleteTransportadora($id_tran)) {
        echo "Transportadora eliminada exitosamente.";
        // Redirigir a la página de lista después de la eliminación
        header("Location: index.php");
        exit();
    } else {
        echo "Error al eliminar la transportadora.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Transportadora</title>
</head>
<body>

<h2>Eliminar Transportadora</h2>

<?php if (isset($transportadora)): ?>
    <p>¿Estás seguro de que deseas eliminar la transportadora "<?php echo $transportadora['nomb_tran']; ?>"?</p>

    <form method="post" action="eliminar_transportadora.php">
        <input type="hidden" name="id_tran" value="<?php echo $transportadora['id_tran']; ?>">
        <input type="submit" name="confirmar" value="Sí, eliminar">
    </form>
<?php else: ?>
    <p>Transportadora no encontrada.</p>
<?php endif; ?>

<a href="ver_transportadora.php">Cancelar</a>

</body>
</html>
