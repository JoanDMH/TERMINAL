



<!DOCTYPE html>
<html lang="en">
<head>
    <title>Menú Desplegable</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <style>
        body {
            padding-top: 56px;
        }

        /* Personalizar la barra de navegación */
        .navbar {
            background-color: #343a40; /* Color de fondo */
        }

        .navbar-dark .navbar-nav .nav-link {
            color: #fff; /* Color del texto */
        }

        .navbar-dark .navbar-toggler-icon {
            background-color: #fff; /* Color del icono del botón de alternancia */
        }

        /* Alinear el botón "Cerrar Sesión" a la derecha */
        .ml-auto {
            margin-left: auto !important;
        }

        /* Personalizar el menú desplegable */
        .navbar-nav .nav-link.dropdown-toggle::after {
            border-color: #fff; /* Color de la flecha del menú desplegable */
        }

        .navbar-nav .nav-link.dropdown-toggle:hover::after {
            border-color: transparent; /* Ocultar la flecha cuando se pasa el ratón sobre el enlace */
        }
    </style>
</head>
<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <!-- Menú de la izquierda -->
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/index.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/contratos/index.php">Contratos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/buses/index.php">Buses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/rutas/index.php">Rutas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/transportadora/index.php">Transportadora</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/conductores/index_conductores.php">Conductores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/ciudades/index_ciudades.php">Ciudades</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/tickets/index.php">tickets</a>
                    </li>
                </ul>

                <!-- Botón "Cerrar Sesión" a la derecha -->
                

                <!-- Menú desplegable de la derecha -->
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/app/viewsAdmin/logoutAdmin.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-kjU+l4N0Yf4ZOJErLsIcvOU2qSb74wXpOhqTvwVx3OElZRweTnQ6d31fXEoRD1Jy" crossorigin="anonymous"></script>
</body>
</html>
