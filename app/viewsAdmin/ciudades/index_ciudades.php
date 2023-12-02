<?php
require_once '../../models/ciudades/CiudadModel.php';

$ciudadModel = new CiudadModel();
$ciudades = $ciudadModel->listarCiudades();
$totalCiudades = $ciudadModel->contarCiudades();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ciudades</title>
    <!-- Agrega enlaces a Bootstrap CSS si es necesario -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        h1 {
            color: #007BFF;
        }

        ul {
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            padding: 5px;
            
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.15);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .actions a {
            margin-left: 10px;
            text-decoration: none;
            color: #007BFF;
        }

        .actions a.delete {
            color: #dc3545;
        }

        .add-button {
            margin-top: 20px;
        }

        .add-button a {
            display: inline-block;
            padding: 10px 15px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .add-button a:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <?php include '../menu.php'; ?>
    <div class="container">
        <br>
        <h1>Listado de Ciudades <img src="../../../public/images/depMeta.png" width="80"></h1>
        <p>Total de ciudades: <?php echo $totalCiudades; ?></p>
        <ul>
            <?php foreach ($ciudades as $ciudad): ?>
                <li>
                    <span><?php echo $ciudad['nomb_ciud']; ?></span>
                    <div class="actions">
                        <a href="editar_ciudad.php?id=<?php echo $ciudad['id_ciud']; ?>">Editar</a>
                        <a href="eliminar_ciudad.php?id=<?php echo $ciudad['id_ciud']; ?>" class="delete" onclick="return confirm('¿Estás seguro de eliminar esta ciudad?')">Eliminar</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="add-button">
            <a href="formulario_ciudad.php">Agregar Ciudad</a>
        </div>
    </div>

    <!-- Agrega enlaces a Bootstrap JavaScript si es necesario -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-eXsxbwEKaG0D7gkvIKBz4qdlIu6fjJ9Uotl3zksIRdMddjRRz8grf1kgCIdT6jU" crossorigin="anonymous"></script>
</body>
</html>
