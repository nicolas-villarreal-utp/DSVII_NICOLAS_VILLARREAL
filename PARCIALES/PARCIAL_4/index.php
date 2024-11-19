<?php
session_start();

error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

require_once 'database.php';
require_once 'configuracion.php';
require_once 'api/GoogleBooksAPI.php';
require_once 'modelos/Usuario.php';
require_once 'modelos/LibroGuardado.php';

//Validar usuario en session
if (!isset($_SESSION['user_id'])) {
    // authenticate code from Google OAuth Flow
    if (isset($_GET['code'])) {
        
        require_once 'configuracion.php';

        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $email =  $google_account_info->email;
        $name =  $google_account_info->name;
        $google_id = $google_account_info->getId();

        // Conectar a la base de datos
        $database = new Database();
        $db = $database->connect();

        // Crear un nuevo usuario
        $usuario = new Usuario($db);

        if (count($usuario->validarExiste($email)) > 0) {

            $usuarioExiste = $usuario->validarExiste($email);

            //print_r($usuarioExiste);

            $_SESSION['user_id'] = $usuarioExiste[0]['id'];
            $_SESSION['user_name'] = $usuarioExiste[0]['nombre'];
            $_SESSION['user_google_id'] = $usuarioExiste[0]['google_id'];
            $_SESSION['user_email_address'] = $usuarioExiste[0]['email'];
            //Profile Picture
            $_SESSION['user_image'] = $google_account_info->picture;
        } else {

            $usuario->crearUsuario($email, $name, $google_id);

            $usuarioExiste = $usuario->validarExiste($email);

            $_SESSION['user_id'] = $usuarioExiste[0]['id'];
            $_SESSION['user_name'] = $usuarioExiste[0]['nombre'];
            $_SESSION['user_google_id'] = $usuarioExiste[0]['google_id'];
            $_SESSION['user_email_address'] = $usuarioExiste[0]['email'];

            //Profile Picture
            $_SESSION['user_image'] = $google_account_info->picture;
        }
    } else {
        // redirect to login.php
        header('location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <title>Inicio</title>
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-3">

                <h1>Usuario</h1>
                <img src="<?php echo $_SESSION['user_image']; ?>" alt="Profile Picture">
                <p>Nombre: <?php echo $_SESSION['user_name']; ?></p>
                <p>Email: <?php echo $_SESSION['user_email_address']; ?></p>
                <p>Google ID: <?php echo $_SESSION['user_google_id']; ?></p>

                <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
            </div>
            <div class="col-9">


                <div class="col-12">
                    <h2>Buscar Libros</h2>
                    <form action="buscarlibros.php" method="post">
                        <div class="input-group mb-3">
                            <input name="buscar" id="buscar" type="text" class="form-control" placeholder="Buscar libro" aria-label="Buscar libro" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <h2>Mis Libros</h2>
                    <?php

                    // Conectar a la base de datos
                    $database = new Database();
                    $db = $database->connect();

                    // Obtener libros guardados por un usuario específico
                    $libro = new LibroGuardado($db);

                    //Usuario de Session
                    $usuario_id = $_SESSION['user_id'];

                    $libros_usuario = $libro->obtenerLibrosPorUsuario($usuario_id);

                    //print_r($libros_usuario);

                    // Mostrar resultados de búsqueda
                    foreach ($libros_usuario as $libro) {


                        $buscarLibros = new GoogleBooksAPI($apiKey);
                        $item = $buscarLibros->obtenerLibroPorId($libro['google_books_id']);


                    ?>

                        <div class="card" style="margin: 10px">
                            <img class="card-img-top" style="padding: 10px; max-height: 200px; object-fit: contain" src="<?php echo $item['volumeInfo']['imageLinks']['thumbnail'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['volumeInfo']['title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?php
                                    if (isset($item['volumeInfo']['authors'])) {
                                        echo "Autor: " . implode(", ", $item['volumeInfo']['authors']) . "<br>";
                                    }
                                    ?>
                                </h6>
                                <p class="card-text">
                                    <?php
                                    if (isset($item['volumeInfo']['description'])) {
                                        //echo "Descripción: " . $item['volumeInfo']['description'] . "<br><br>";
                                    }

                                    echo "Reseña Personal: " . $libro['resena_personal'] . "<br>";

                                    ?>
                                </p>
                                <form action="eliminarlibro.php" method="post">
                                    <input type="hidden" name="libroguardado_id" value="<?php echo $libro['id']; ?>">
                                    <button type="submit" class="btn btn-danger float-right">Eliminar</button>
                                </form>
                            </div>
                        </div>

                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>