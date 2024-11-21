<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
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
    </style>
</head>
<body>

<div class="container">
    <h1>Registro de Usuario</h1>
    <form action="registrar.php" method="POST">
        <label for="nombre">Nombre Completo:</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>

        <label for="email">Correo Electrónico:</label>
        <input type="email" id="email" name="email" placeholder="ejemplo@correo.com" required>

        <label for="username">Nombre de Usuario:</label>
        <input type="text" id="username" name="username" placeholder="Crea un nombre de usuario" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Crea una contraseña" required>

        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Repite la contraseña" required>

        <button type="submit">Registrarse</button>
    </form>
<div class="login-btn">
        
    

  
<p>¿Ya tienes una cuenta? <a href="login.html">Iniciar Sesión</a></p>
    </div>
</div>

</body>

</html
</html>