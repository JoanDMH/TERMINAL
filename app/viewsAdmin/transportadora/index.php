<?php
require_once 'TransportadoraModel.php';

// Gestionar la creación de una transportadora
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["submit"])) {
        $nomb_tran = $_POST["nomb_tran"];
        $dire_tran = $_POST["dire_tran"];
        $cel = $_POST["cel"];
        $correo = $_POST["correo"];

        // Validar datos (agregar validaciones según tus necesidades)

        // Crear la transportadora
        if (TransportadoraModel::createTransportadora($nomb_tran, $dire_tran, $cel, $correo)) {
            echo "Transportadora creada exitosamente.";
        } else {
            echo "Error al crear la transportadora.";
        }
    }
}

// Mostrar la lista de transportadoras
$transportadoras = TransportadoraModel::getTransportadoras();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Transportadoras</title>
</head>
<body>


<!-- Formulario de creación de transportadora aquí -->
<h2>Crear nueva transportadora</h2>
<form method="post" action="index.php">
    <label for="nomb_tran">Nombre:</label>
    <input type="text" name="nomb_tran" required><br>
    <label for="dire_tran">Dirección:</label>
    <input type="text" name="dire_tran" required><br>
    <label for="cel">Teléfono:</label>
    <input type="text" name="cel" required><br>
    <label for="correo">Correo:</label>
    <input type="email" name="correo" required><br>
    <input type="submit" name="submit" value="Crear">
</form>

<h2>Listado de transportadoras</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Dirección</th>
        <th>Teléfono</th>
        <th>Correo</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach ($transportadoras as $transportadora) {
        echo "<tr>";
        echo "<td>{$transportadora['id_tran']}</td>";
        echo "<td>{$transportadora['nomb_tran']}</td>";
        echo "<td>{$transportadora['dire_tran']}</td>";
        echo "<td>{$transportadora['cel']}</td>";
        echo "<td>{$transportadora['correo']}</td>";
        echo "<td>";
        echo "<a href='editar_transportadora.php?id={$transportadora['id_tran']}'>Editar</a> | ";
        echo "<a href='eliminar_transportadora.php?id={$transportadora['id_tran']}'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>

