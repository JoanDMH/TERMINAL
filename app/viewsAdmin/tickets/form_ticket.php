<?php
require_once 'TicketModel.php'; // Asegúrate de tener la ruta correcta
$ticketModel = new TicketModel($db); // Asegúrate de tener la instancia correcta de tu conexión

// Si se proporciona un ID de ticket, obtén los detalles del ticket
if (isset($_GET['id_tick'])) {
    $id_tick = $_GET['id_tick'];
    $ticket = $ticketModel->getTicketById($id_tick);
} else {
    $id_tick = '';
    $ticket = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terminal - Formulario de Ticket</title>
</head>
<body>
    <h1>Formulario de Ticket</h1>

    <form action="index.php" method="post">
        <!-- Campo oculto para enviar el ID del ticket en caso de actualización -->
        <input type="hidden" name="id_tick" value="<?php echo $id_tick; ?>">

        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="<?php echo ($ticket ? $ticket['fecha'] : ''); ?>" required><br>

        <label for="id_cli">ID Cliente:</label>
        <input type="text" name="id_cli" value="<?php echo ($ticket ? $ticket['id_cli'] : ''); ?>" required><br>

        <label for="id_ruta">ID Ruta:</label>
        <input type="text" name="id_ruta" value="<?php echo ($ticket ? $ticket['id_ruta'] : ''); ?>" required><br>

        <label for="id_asiento">ID Asiento (ID Bus):</label>
        <input type="text" name="id_asiento" value="<?php echo ($ticket ? $ticket['id_asiento'] : ''); ?>" required><br>

        <input type="submit" value="Guardar Ticket">
    </form>

    <a href="index.php">Volver al Listado de Tickets</a>
</body>
</html>
