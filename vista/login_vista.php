<?php
// 1. Iniciar la sesión por si el usuario ya está logueado
session_start();

// Si ya existe una sesión activa, lo redirigimos al index o panel principal
if (isset($_SESSION['tipo'])) {
    header('Location: ../index.php'); 
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Animalia - Iniciar Sesión</title>
</head>
<body>

    <h2>Animalia Login</h2>
    
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;">
            <?php 
                if ($_GET['error'] == 'credenciales') echo "Usuario o contraseña incorrectos.";
                if ($_GET['error'] == 'inactivo') echo "Tu cuenta se encuentra inactiva.";
                if ($_GET['error'] == 'vacio') echo "Por favor, llene todos los campos.";
            ?>
        </p>
    <?php endif; ?>

    <form action="../controlador/login_controlador.php" method="POST">
        
        <label for="login_usuario">Usuario:</label><br>
        <input type="text" id="login_usuario" name="login_usuario" placeholder="Ej: acastillo" required><br><br>

        <label for="password_usuario">Contraseña:</label><br>
        <input type="password" id="password_usuario" name="password_usuario" placeholder="********" required><br><br>

        <button type="submit">Ingresar</button>
        
    </form>

</body>
</html>