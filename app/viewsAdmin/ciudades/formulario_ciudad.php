<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Ciudad</title>
    <!-- Agrega el enlace a Bootstrap CSS -->
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

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <h1 class="mt-5">Agregar Ciudad</h1>
        <form action="../../controllers/ciudades/procesar_formulario_ciudad.php" method="post" class="mt-4">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre de la Ciudad:</label>
                <input type="text" class="form-control" name="nombre" required>
            </div>
            <button type="submit" class="btn btn-primary">Agregar Ciudad</button>
        </form>
        <a href="index_ciudades.php" class="btn btn-secondary mt-3">Volver al Listado</a>
    </div>

    <!-- Agrega el enlace a Bootstrap JavaScript si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-eXsxbwEKaG0D7gkvIKBz4qdlIu6fjJ9Uotl3zksIRdMddjRRz8grf1kgCIdT6jU" crossorigin="anonymous"></script>
</body>
</html>
