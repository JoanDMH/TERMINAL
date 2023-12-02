<?php
session_start();

// Verifica las credenciales y maneja la autenticación
function login($username, $password) {
    // Aquí debes realizar la verificación de las credenciales.
    // Puedes consultar una base de datos o usar alguna lógica de autenticación.

    // Por ejemplo, verifica si el usuario y la contraseña son "admin" y "admin123"
    return ($username === "admin" && $password === "postgres");
}

// Cierra la sesión de usuario
function logout() {
    session_destroy();
}

// Maneja el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (login($username, $password)) {
        // Almacena el estado de la sesión para indicar que el usuario está autenticado
        $_SESSION['authenticated'] = true;

        // Redirige a la página principal después de iniciar sesión
        header('Location: index.php');
        exit;
    } else {
        // Muestra un mensaje de error si las credenciales son incorrectas
        $error_message = "Credenciales incorrectas. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LoginAdmin</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
            padding: 30px;
        }

        .login-form h5,
        .welcome-message h5 {
            text-align: center;
            color: #007BFF;
        }

        .login-form form,
        .welcome-message button,
        .welcome-message a {
            margin-top: 20px;
        }
    </style>
</head>
<body>

<?php
// Si el usuario no está autenticado, muestra el formulario de inicio de sesión
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    ?>
    <div class="container">
        <div class="row justify-content-center p-5">
            <div class="col-sm-6">
                <!-- Formulario de inicio de sesión -->
                <div class="login-form">
                    <h5>Iniciar Sesión</h5>
                    <form method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Usuario</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Ingresar</button>
                        <?php if (isset($error_message)) { ?>
                            <div class="alert alert-danger mt-3" role="alert">
                                <?php echo $error_message; ?>
                            </div>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
} else {
    // Si el usuario está autenticado, muestra el contenido principal
    ?>
    <div class="container">
        <div class="row justify-content-center p-5">
            <div class="col-sm-6">
                <div class="welcome-message">
                    <h5>Bienvenido, Administrador</h5>
                    <!-- Agregar botón Continuar -->
                    <button class="btn btn-primary" onclick="location.href='/app/viewsAdmin/index.php'">Continuar</button>
                    <!-- Fin del botón Continuar -->

                    <!-- Opción para cerrar sesión -->
                    <a href="/app/viewsAdmin/logoutAdmin.php" class="btn btn-danger">Cerrar Sesión</a>
                    <!-- Fin de la opción para cerrar sesión -->
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>

<!-- Bootstrap JavaScript Libraries -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-eXsxbwEKaG0D7gkvIKBz4qdlIu6fjJ9Uotl3zksIRdMddjRRz8grf1kgCIdT6jU" crossorigin="anonymous"></script>

</body>
</html>
