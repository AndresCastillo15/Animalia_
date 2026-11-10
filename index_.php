
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #111827;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        form {
            background: #1f2937;
            padding: 35px;
            width: 350px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.4);
        }

        h2 {
            color: white;
            text-align: center;
            margin-bottom: 25px;
        }

        label {
            color: #e5e7eb;
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #4b5563;
            border-radius: 8px;
            background: #374151;
            color: white;
            outline: none;
            margin-bottom: 18px;
        }

        input:focus {
            border-color: #3b82f6;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

    <form action="../modelo/usuario_modelo.php" method="POST">

        <h2>Iniciar sesión</h2>

        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required autofocus>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo">

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Iniciar sesión">

    </form>

</body>
</html>
