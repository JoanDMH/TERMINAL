<!DOCTYPE html>
<html lang="es">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        .custom-container {
            max-width: 50%;
            margin: auto;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            cursor: pointer;
            background-color: #218838;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #1e7e34;
        }

        h1 {
            margin-top: 50px;
        }

        img {
            margin-left: 10px;
        }

        .mt-5 {
            margin-top: 30px !important;
        }

        .mt-4 {
            margin-top: 20px;
        }

        .mb-3 {
            margin-bottom: 20px;
        }

        .btn-secondary {
            background-color: #6c757d;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Cliente</title>
    <!-- Agrega enlaces a Bootstrap si lo deseas -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
</head>
<body>

<?php include 'menu.php'; ?>

<div class="container custom-container">
    <div class="row justify-content-center p-5">
        <div class="col-sm-6">
            <h1 class="mt-5">Agregar Cliente <img src="../../public/images/agregarUsuario.png" width="60"></h1>
            <form action="../controllers/procesar_formulario.php" method="post" class="mt-4">
                <div class="mb-3">
                    <label for="id" class="form-label">Número de Documento:</label>
                    <input type="number" class="form-control" name="id" min="1000000000" max="9999999999" placeholder="Identificación" required>
                </div>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" name="nombre" placeholder="Nombres" required>
                </div>
                <div class="mb-3">
                    <label for="apellido" class="form-label">Apellido:</label>
                    <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required>
                </div>
                <div class="mb-3">
                    <label for="edad" class="form-label">Edad:</label>
                    <input type="number" class="form-control" name="edad" min="18" max="150" placeholder="18 años" required>
                </div>
                <button type="submit" class="btn btn-primary">Agregar Cliente</button>
            </form>
            <a href="../viewsAdmin/listadoClientes.php" class="btn btn-secondary mt-3">Ver Listado de Clientes</a>
        </div>
    </div>
</div>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>

</body>
</html>
