
<?php
require (__DIR__."/../config/conexion.php");

// Funcion para validar usuario
function validar_usuario($login, $correo, $password)
{
    $conexion = conexion();

    // Consulta SQL
    $sql = "SELECT correo, id_usuario, login_usuario, password_usuario,
            estado_usuario, tipo_usuario
            FROM usuario
            WHERE login_usuario = '$login'
            AND correo = '$correo'
            AND password_usuario = '$password'";

    $consulta = mysqli_query($conexion, $sql)
        or trigger_error("Error en la consulta MySQL: ".mysqli_error($conexion));

    $resultado = mysqli_fetch_assoc($consulta);

    // Diseño CSS
    echo '
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Validación de usuario</title>

        <style>
            body {
                font-family: Arial, sans-serif;
                background: #111827;
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                margin: 0;
                color: white;
            }

            .contenedor {
                background: #1f2937;
                padding: 35px;
                width: 350px;
                border-radius: 15px;
                box-shadow: 0 5px 20px rgba(0,0,0,0.4);
            }

            h2 {
                text-align: center;
                color: #60a5fa;
                margin-bottom: 25px;
            }

            p {
                background: #374151;
                padding: 12px;
                border-radius: 8px;
            }

            .exito {
                color: #4ade80;
                text-align: center;
            }

            .error {
                color: #f87171;
                text-align: center;
            }

            a {
                display: block;
                text-align: center;
                background: #2563eb;
                color: white;
                padding: 12px;
                border-radius: 8px;
                text-decoration: none;
                margin-top: 20px;
            }

            a:hover {
                background: #1d4ed8;
            }
        </style>
    </head>

    <body>
        <div class="contenedor">
            <h2>Inicio de sesión</h2>
    ';

    // Verificar usuario
    if($resultado)
    {
        echo '<h3 class="exito">¡Bienvenido!</h3>';
        echo '<p>Usuario: '.$resultado['login_usuario'].'</p>';
        echo '<p>ID: '.$resultado['id_usuario'].'</p>';
        echo '<p>Correo: '.$resultado['correo'].'</p>';
        echo '<p>Tipo: '.$resultado['tipo_usuario'].'</p>';
        echo '<p>Estado: '.$resultado['estado_usuario'].'</p>';
    }
    else
    {
        echo '<h3 class="error">Error al iniciar sesión</h3>';
        echo '<p>Login, correo o contraseña incorrectos.</p>';
    }

    echo '
            <a href="../vista/login.html">Volver</a>
        </div>
    </body>
    </html>
    ';

    return $resultado;
}

// Recibir datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user = $_POST['login'];
    $correo = $_POST['correo'];
    $pass = $_POST['password'];

    validar_usuario($user, $correo, $pass);
}
?>
