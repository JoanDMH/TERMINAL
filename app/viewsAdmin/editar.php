<?php
require_once '../models/ClienteModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $clienteModel = new ClienteModel();
    $cliente = $clienteModel->obtenerClientePorId($id);

    if ($cliente) {
        // Mostrar el formulario de edición
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Editar Cliente</title>
            <!-- Enlace a Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    padding: 20px;
                }

                .edit-form-container {
                    max-width: 50%;
                    margin: auto;
                    background-color: #fff;
                    padding: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 5px;
                    margin-top: 50px;
                }

                h1 {
                    color: #007BFF;
                }

                label {
                    margin-top: 10px;
                }

                input {
                    width: 100%;
                    padding: 10px;
                    margin-bottom: 16px;
                    box-sizing: border-box;
                }

                input[type="submit"] {
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #007BFF;
                }

                .back-link {
                    display: inline-block;
                    margin-top: 10px;
                    text-decoration: none;
                    color: #dc3545;
                }

                .back-link:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class="edit-form-container">
                <h1>Editar Cliente</h1>
                <form action="../controllers/procesar_editar.php" method="post">
                    <label for="id">Número de documento:</label>
                    <input type="number" name="id" class="form-control" value="<?php echo $cliente['id_cli']; ?>" required>
                    <label for="nombre">Nombre:</label>
                    <input type="text" name="nombre" class="form-control" value="<?php echo $cliente['nomb_cli']; ?>" required>
                    <label for="apellido">Apellido:</label>
                    <input type="text" name="apellido" class="form-control" value="<?php echo $cliente['ape_cli']; ?>" required>
                    <label for="edad">Edad:</label>
                    <input type="number" name="edad" class="form-control" value="<?php echo $cliente['edad']; ?>" required>
                    <br>
                    <input type="submit" class="btn btn-primary" value="Guardar Cambios">
                </form>
                <br>
                <a href="../viewsAdmin/listadoClientes.php" class="back-link">Volver al Listado</a>
            </div>

            <!-- Enlace a Bootstrap JavaScript y Popper.js -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Cliente no encontrado.";
    }
} else {
    echo "Parámetros no válidos.";
}
?>
