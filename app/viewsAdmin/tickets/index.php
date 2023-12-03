<?php
require_once '../../config/connection.php';
require_once 'TicketModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/models/ClienteModel.php';
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/buses/BusesModel.php'; // Agregado
require_once '/home/joan/Escritorio/TERMINAL/app/viewsAdmin/rutas/RutaModel.php'; // Agregado

// Crear la conexión a la base de datos
$db = Connection::getConnection();

// Verificar que la conexión se haya establecido correctamente
if (!$db) {
    echo "Error al conectar a la base de datos.";
    exit;
}

// Crear instancias de los modelos
$ticketModel = new TicketModel($db);
$clienteModel = new ClienteModel($db);
$rutaModel = new RutaModel($db); // Agregado
$busesModel = new BusesModel($db);
$nombresClientes = $clienteModel->getNombresClientes();
$modelosBuses = $busesModel->getModelosBuses();
$clientes = $clienteModel->listarClientes();


// Procesar el formulario de creación de ticket
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_tick = isset($_POST['id_tick']) ? $_POST['id_tick'] : null;
    $fecha = $_POST['fecha'];
    $id_cli = $_POST['id_cli'];
    $id_ruta = isset($_POST['id_ruta']) ? $_POST['id_ruta'] : null;
    $id_asiento = isset($_POST['id_asiento']) ? $_POST['id_asiento'] : null;

    // Validar que id_tick no sea null antes de insertar o actualizar
    if ($id_tick !== null && $id_ruta !== null) {
        // Utilizar la función correcta de TicketModel
        if ($ticketModel->insertOrUpdateTicket($id_tick, $fecha, $id_cli, $id_ruta, $id_asiento)) {
            echo "Ticket guardado o actualizado exitosamente.";
        } else {
            echo "Error al guardar o actualizar el ticket.";
        }
    } else {
        echo "Error: El campo ID Ticket o ID Ruta no puede ser nulo.";
    }
}


// Obtener todos los tickets
$tickets = $ticketModel->getAllTickets();

// Obtener nombres de clientes
$nombresClientes = $clienteModel->getNombresClientes();

// Obtener horas de salida de rutas
$horasSalida = $rutaModel->getHorasSalidaRutas();

// Obtener modelos de buses
$modelosBuses = $busesModel->getModelosBuses();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal - Sistema de Tickets</title>
</head>
<body>
    <h1>Sistema de Tickets</h1>

    <!-- Formulario para creación de ticket -->
<h2>Crear Nuevo Ticket</h2>
<form action="index.php" method="post">
    <label for="id_ruta">ID Ruta:</label>
    <input type="text" name="id_ruta" required><br>

    <label for="fecha">Fecha:</label>
    <input type="date" name="fecha" required><br>

    <label for="id_cli">ID Cliente:</label>
    <select name="id_cli">
        <?php foreach ($clientes as $cliente): ?>
            <option value="<?php echo $cliente['id_cli']; ?>"><?php echo $cliente['nomb_cli']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="hora_sal">Hora de Salida:</label>
    <select name="hora_sal">
        <?php foreach ($horasSalida as $hora): ?>
            <option value="<?php echo $hora['hora_sal']; ?>"><?php echo $hora['hora_sal']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <label for="id_bus">Modelo de Bus:</label>
    <select name="modelo_bus">
        <?php foreach ($modelosBuses as $modelo): ?>
            <option value="<?php echo $modelo['id_bus']; ?>"><?php echo $modelo['modelo']; ?></option>
        <?php endforeach; ?>
    </select><br>

    <input type="submit" value="Crear Ticket">
</form>



    <!-- Tabla de listado de tickets -->
    <h2>Listado de Tickets</h2>
    <table border="1">
        <tr>
            <th>ID Ticket</th>
            <th>Fecha</th>
            <th>ID Cliente</th>
            <th>ID Ruta</th>
            <th>ID Asiento (ID Bus)</th>
            <!-- Agrega más columnas según tu estructura -->
        </tr>
        <?php foreach ($tickets as $ticket): ?>
            <tr>
                <td><?php echo $ticket['id_tick']; ?></td>
                <td><?php echo $ticket['fecha']; ?></td>
                <td><?php echo $ticket['id_cli']; ?></td>
                <td><?php echo $ticket['id_ruta']; ?></td>
                <td><?php echo $ticket['id_asiento']; ?></td>
                <!-- Agrega más celdas según tu estructura -->
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
