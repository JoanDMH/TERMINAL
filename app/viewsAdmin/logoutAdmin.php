<?php
session_start();
session_destroy();
header('Location: /inicio.php'); // Redirige al formulario de inicio de sesión
exit;
?>
