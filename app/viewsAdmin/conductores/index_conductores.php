<?php
// index.php

require_once '../../config/connection.php';
require_once 'ConductorModel.php';

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y obtener datos del formulario
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $celular = $_POST['celular'];
    $correo = $_POST['correo'];

    // Validaciones (puedes agregar más según tus requisitos)

    // Crear un array con los datos del conductor
    $conductorData = array(
        'id' => $id,
        'nombre' => $nombre,
        'apellido' => $apellido,
        'celular' => $celular,
        'correo' => $correo
    );

    // Llamar al método para agregar conductor en el modelo
    if (ConductorModel::addConductor($conductorData)) {
        echo "Conductor agregado exitosamente.";
    } else {
        echo "Error al agregar conductor.";
    }
}

// Mostrar formulario para insertar conductores
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Conductores</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .custom-container {
            max-width: 50%;
            margin: auto;
        }
        form {
            margin-top: 20px;
        }
        label {
            margin-bottom: 5px;
        }
        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            cursor: pointer;
            background-color: #218838;
            color: #fff;
        }
        input[type="submit"]:hover {
            background-color: #1e7e34;
        }
        a.btn {
            color: #fff;
            background-color: #007bff;
            padding: 8px 16px;
            text-decoration: none;
        }
        a.btn:hover {
            background-color: #0056b3;
        }
        li {
            margin-bottom: 10px;
            padding: 5px;
            
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <?php include '../../viewsAdmin/menu.php'; ?>
    <div class="custom-container">
        <h1 class="mt-4">Formulario para Insertar Conductores</h1>

        <form method="post" action="index_conductores.php">
            <div class="mb-3">
                <label for="id" class="form-label">ID del Conductor:</label>
                <input type="text" id="id" name="id" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="apellido" class="form-label">Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="celular" class="form-label">Número de Celular:</label>
                <input type="text" id="celular" name="celular" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="correo" class="form-label">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Agregar Conductor</button>
        </form>

        <!-- Botón para ver conductores -->
        <a href="ver_conductores.php" class="btn btn-info mt-3">Ver Conductores</a>
    </div>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
