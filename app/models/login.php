<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>

    <?php
    // Mostrar mensaje de error si existe
    if (isset($_GET['error']) && $_GET['error'] == 1) {
        echo '<p style="color: red;">Credenciales inválidas. Inténtalo de nuevo.</p>';
    }
    ?>

    <form action="procesar_login.php" method="post">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br>

        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required><br>

        <input type="submit" value="Iniciar sesión">
    </form>
</body>
</html>
