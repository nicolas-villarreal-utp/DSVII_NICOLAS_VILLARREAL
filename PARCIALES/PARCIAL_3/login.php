<?php

include 'datos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    //Validar que el password solo tiene numeros y letras
    if (!preg_match('/^[a-zA-Z0-9]+$/', $password)) {
        echo 'La contraseña solo puede contener letras y números';

        return;
    } else {
        //echo strlen($password);

        //Validar que el password tiene al menos 3 caracteres
        if (strlen($password) < 3) {
            echo '<span style="color:red;">La contraseña debe tener al menos 3 caracteres</span>';
            //echo 'La contraseña debe tener al menos 3 caracteres';

            return;
        } else {
            //Validar que el password tiene no mas de 8 caracteres
            if (strlen($password) > 8) {
                echo '<span style="color:red;">La contraseña no puede tener más de 8 caracteres</span>';
                //echo 'La contraseña no puede tener más de 8 caracteres';

                return;
            } else {

                $datos = new Datos();

                if (!$datos->validarUsuario($email, $password)) {
                    echo '<span style="color:red;">Usuario o contraseña incorrectos</span>';
                    //echo 'Usuario o contraseña incorrectos';
                } else {

                    session_start();

                    $usuario = $datos->validarUsuario($email, $password);

                    $_SESSION['usuario'] = $usuario['correo'];
                    $_SESSION['rol'] = $usuario['rol'];
                    $_SESSION['nombre'] = $usuario['nombre'];

                    header('Location: index.php');
                }
            }
        }
    }
}
?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Iniciar Sesión</title>
</head>

<body>
    <div class="container">
        <h1>Iniciar Sesión</h1>
        <form action="login.php" method="post">
            <label for="email">Correo Electrónico:</label>
            <input class="form-control" type="email" name="email" id="email" required>
            <br>
            <label for="password">Contraseña:</label>
            <input class="form-control" type="password" name="password" id="password" required>
            <br>
            <button class="btn btn-primary" type="submit">Iniciar Sesión</button>
        </form>
    </div>
</body>

</html>