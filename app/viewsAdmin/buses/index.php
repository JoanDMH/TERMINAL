<?php
require_once 'BusesModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/transportadora/TransportadoraModel.php';
$transportadorasList = TransportadoraModel::getTransportadorasList();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id_bus = $_POST["id_bus"];
    $modelo = $_POST["modelo"];
    $capacidad = $_POST["capacidad"];
    $id_tran = $_POST["id_tran"];
    
    // Mostrar la lista de transportadoras en una lista desplegable
    

    // Validar datos (agregar validaciones según tus necesidades)
    

    // Crear el nuevo bus
    if (BusesModel::createBus($id_bus, $modelo, $capacidad, $id_tran)) {
        echo "Bus creado exitosamente.";
        // Redirigir para evitar el reenvío del formulario al actualizar la página
        header("Location: index.php");
        exit();
    } else {
        echo "Error al crear el bus.";
    }
}


// Mostrar la lista de buses
$buses = BusesModel::getBuses();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Buses</title>
</head>
<body>
<?php include '../menu.php'; ?>
<h2>Crear nuevo Bus</h2>
<form method="post" action="index.php">
    <label for="id_bus">ID Bus:</label>
    <input type="text" name="id_bus" required><br>

    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo" required><br>

    <label for="capacidad">Capacidad:</label>
<select name="capacidad" required>
    <option value="10">10</option>
    <option value="20">20</option>
    <option value="30">30</option>
    <option value="40">40</option>
</select>
<br>


    <label for="id_tran">ID Transportadora:</label>
    <select name="id_tran" required>
    <?php
    foreach ($transportadorasList as $transportadora) {
        echo "<option value='{$transportadora['id_tran']}'>{$transportadora['nomb_tran']}</option>";
    }
    ?>
</select>

    <input type="submit" name="submit" value="Crear Bus">
</form>

<h2>Listado de Buses</h2>
<table border="1">
    <tr>
        <th>ID Bus</th>
        <th>Modelo</th>
        <th>Capacidad</th>
        <th>ID Transportadora</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach ($buses as $bus) {
        echo "<tr>";
        echo "<td>{$bus['id_bus']}</td>";
        echo "<td>{$bus['modelo']}</td>";
        echo "<td>{$bus['capacidad']}</td>";
        echo "<td>{$bus['id_tran']}</td>";
        echo "<td>";
        echo "<a href='editar_bus.php?id={$bus['id_bus']}'>Editar</a> | ";
        echo "<a href='eliminar_bus.php?id={$bus['id_bus']}'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>
