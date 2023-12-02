<?php
require_once '../../models/ciudades/CiudadModel.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $ciudadModel = new CiudadModel();
    $ciudad = $ciudadModel->obtenerCiudadPorId($id);

    if ($ciudad) {
        // Mostrar confirmación de eliminación
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Eliminar Ciudad</title>
            <!-- Enlace a Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
            <style>
                body {
                    font-family: Arial, sans-serif;
                    background-color: #f8f9fa;
                    padding: 20px;
                }

                .confirmation-container {
                    max-width: 50%;
                    margin: auto;
                    background-color: #fff;
                    padding: 20px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    border-radius: 5px;
                    margin-top: 50px;
                }

                h1 {
                    color: #dc3545;
                }

                p {
                    margin-bottom: 20px;
                }

                input[type="submit"] {
                    cursor: pointer;
                }

                input[type="submit"]:hover {
                    background-color: #dc3545;
                }

                .cancel-link {
                    display: inline-block;
                    margin-top: 10px;
                    text-decoration: none;
                    color: #007BFF;
                }

                .cancel-link:hover {
                    text-decoration: underline;
                }
            </style>
        </head>
        <body>
            <div class="confirmation-container">
                <h1>Eliminar Ciudad</h1>
                <p>¿Estás seguro de que quieres eliminar la ciudad "<?php echo $ciudad['nomb_ciud']; ?>"?</p>
                <form action="../../controllers/ciudades/procesar_eliminar_ciudad.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $ciudad['id_ciud']; ?>">
                    <input type="submit" class="btn btn-danger" value="Eliminar">
                </form>
                <br>
                <a href="index_ciudades.php" class="cancel-link">Cancelar</a>
            </div>

            <!-- Enlace a Bootstrap JavaScript y Popper.js -->
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
        </body>
        </html>
        <?php
    } else {
        echo "Ciudad no encontrada.";
    }
} else {
    echo "Parámetros no válidos.";
}
?>
