<?php
require_once 'TransportadoraModel.php';

$transportadoras = TransportadoraModel::getTransportadoras();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Transportadoras</title>
</head>
<body>

<h2>Listado de Transportadoras</h2>
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
