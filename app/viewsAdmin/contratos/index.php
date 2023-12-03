<?php
require_once 'ContratoModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/buses/BusesModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/conductores/ConductorModel.php';

// Obtener la lista de contratos
$contratos = ContratoModel::getContratos();

// Obtener la lista de buses y conductores para el formulario de creación
$buses = BusesModel::getBuses();
$conductores = ConductorModel::getAllConductores();

// Procesar el formulario de creación de contrato
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $id_bus = $_POST["id_bus"];
    $id_cond = $_POST["id_cond"];
    $fecha_ini = $_POST["fecha_ini"];
    $fecha_fin = $_POST["fecha_fin"];

    // Validar datos (agregar validaciones según tus necesidades)

    // Crear un nuevo contrato
    if (ContratoModel::createContrato($id_bus, $id_cond, $fecha_ini, $fecha_fin)) {
        echo "Contrato creado exitosamente.";
        // Recargar la página para mostrar el nuevo contrato en la lista
        header("Location: index.php");
        exit();
    } else {
        echo "Error al crear el contrato.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Contratos</title>
</head>
<body>

<h2>Listado de Contratos</h2>
<?php include '../menu.php'; ?>
<!-- Formulario para crear un nuevo contrato -->
<form method="post" action="index.php">
    <label for="id_bus">ID Bus:</label>
    <select name="id_bus" required>
        <?php
        foreach ($buses as $bus) {
            echo "<option value='{$bus['id_bus']}'>{$bus['modelo']}</option>";
        }
        ?>
    </select><br>

    <label for="id_cond">ID Conductor:</label>
    <select name="id_cond" required>
        <?php
        foreach ($conductores as $conductor) {
            echo "<option value='{$conductor['id_cond']}'>{$conductor['nomb_cond']} {$conductor['apel_cond']}</option>";
        }
        ?>
    </select><br>

    <label for="fecha_ini">Fecha de Inicio:</label>
    <input type="date" name="fecha_ini" required><br>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" name="fecha_fin"><br>

    <input type="submit" name="submit" value="Crear Contrato">
</form>

<a href="reporteContratos.php">Ver Reporte de Conductores sin Contrato</a></br>
<a href="detallesContratos.php">Ver Detalles de Contratos Actuales Vigentes</a></br>
<a href="vistaGeneralContrato.php">Ver Todos los Detalles  de Contratos</a></br>



<!-- Mostrar la lista de contratos en una tabla -->
<table border="1">
    <tr>
        <th>ID Bus</th>
        <th>ID Conductor</th>
        <th>Fecha de Inicio</th>
        <th>Fecha de Fin</th>
        <th>Acciones</th>
    </tr>
    <?php
    foreach ($contratos as $contrato) {
        echo "<tr>";
        echo "<td>{$contrato['id_bus']}</td>";
        echo "<td>{$contrato['id_cond']}</td>";
        echo "<td>{$contrato['fecha_ini']}</td>";
        echo "<td>{$contrato['fecha_fin']}</td>";
        echo "<td>";
        echo "<a href='editar_contrato.php?id_bus={$contrato['id_bus']}&id_cond={$contrato['id_cond']}'>Editar</a> | ";
        echo "<a href='eliminar_contrato.php?id_bus={$contrato['id_bus']}&id_cond={$contrato['id_cond']}'>Eliminar</a>";
        echo "</td>";
        echo "</tr>";
    }
    ?>
</table>

</body>
</html>