
<?php
    require (__DIR__."/../config/conexion.php");

    // Funcion para buscar un usuario por su login
    function validar_usuario($login, $password)
    {
        $conexion = conexion();

        // Consulta SQL
        $sql = "SELECT correo, id_usuario, login_usuario, password_usuario,
                estado_usuario, tipo_usuario, COUNT(*) AS contar
                FROM usuario
                WHERE login_usuario = '$login'
                AND password_usuario = '$password'";

        $consulta = mysqli_query($conexion, $sql)
            or trigger_error("Error en la consulta MySql: ".mysqli_error($conexion));

        $resultado = mysqli_fetch_assoc($consulta);

        echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Validación de usuario</title>

            <style>
                body {
                    font-family: Arial, sans-serif;
                    background: #111827;
                    color: white;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    min-height: 100vh;
                    margin: 0;
                }

                .contenedor {
                    background: #1f2937;
                    padding: 30px;
                    width: 350px;
                    border-radius: 15px;
                    box-shadow: 0 5px 20px rgba(0,0,0,0.4);
                }

                h2 {
                    text-align: center;
                    color: #60a5fa;
                }

                p {
                    background: #374151;
                    padding: 10px;
                    border-radius: 7px;
                }

                .error {
                    color: #f87171;
                    text-align: center;
                }

                .exito {
                    color: #4ade80;
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <div class="contenedor">
                <h2>Resultado de validación</h2>
        ';

        // Verificar si el usuario existe
        if($resultado['contar'] > 0)
        {
            echo '<h3 class="exito">Usuario encontrado</h3>';

            echo '<p>Usuario: '.$resultado['login_usuario'].'</p>';
            echo '<p>ID: '.$resultado['id_usuario'].'</p>';
            echo '<p>Correo: '.$resultado['correo'].'</p>';
            echo '<p>Tipo: '.$resultado['tipo_usuario'].'</p>';
            echo '<p>Estado: '.$resultado['estado_usuario'].'</p>';
        }
        else
        {
            echo '<h3 class="error">Usuario no encontrado</h3>';
            echo '<p>Login o contraseña incorrectos.</p>';
        }

        echo '
            </div>
        </body>
        </html>
        ';

        return $resultado;
    }

    // Probar consulta a BD
    $user = 'Andres';
    $pass = 54321;

    validar_usuario($user, $pass);
?>
