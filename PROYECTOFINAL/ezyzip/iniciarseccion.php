<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 400px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin: 10px 0 5px;
            font-weight: bold;
        }
        input {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 16px;
        }
        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        button:hover {
            background-color: #45a049;
        }
        .register-btn {
            margin-top: 20px;
            text-align: center;
        }
        .register-btn a {
            color: #007BFF;
            text-decoration: none;
        }
        .register-btn a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Iniciar Sesión</h1>
    <form action="login.php" method="POST">
        <label for="username">Nombre de Usuario o Correo:</label>
        <input type="text" id="username" name="username" placeholder="Ingresa tu nombre de usuario o correo" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Ingresa tu contraseña" required>

        <button type="submit">Iniciar Sesión</button>
    </form>

    <div class="register-btn">
        <p>¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a></p>
    </div>
</div>

</body>
</html>