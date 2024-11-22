<?php
session_start();

require_once 'Modelos/Conexion.php';
require_once 'Modelos/Cliente.php';
include_once 'clientegoogle.php';

error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);

// Conectar a la base de datos
$database = new Conexion();
$db = $database->conectar();

//Validar usuario en session
if (!isset($_SESSION['id'])) {
    // authenticate code from Google OAuth Flow
    if (isset($_GET['code'])) {

        include_once 'login.php';

        //$token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        //$client->setAccessToken($token['access_token']);

        // get profile info
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        $email =  $google_account_info->email;
        $name =  $google_account_info->name;
        $google_id = $google_account_info->getId();

        // Crear un nuevo usuario
        $cliente = new Cliente($db);

        // Validar si el usuario existe
        $clienteExistente = $cliente->validarSiExiste($email);

        if (count($clienteExistente) > 0) {

            //Guardar informacion del usuario en session
            $oauth = new Google_Service_Oauth2($client);
            $userInfo = $oauth->userinfo->get();
            $_SESSION['id'] =  $userInfo['id'];
            $_SESSION['name'] =  $userInfo['name'];
            $_SESSION['email'] =  $userInfo['email'];
            $_SESSION['picture'] =  $userInfo['picture'];
        } else {

            $cliente->guardarCliente($email, $name, $google_id);

            $clienteNuevo = $cliente->validarSiExiste($email);

            //Guardar informacion del usuario en session
            $oauth = new Google_Service_Oauth2($client);
            $userInfo = $oauth->userinfo->get();
            $_SESSION['id'] =  $userInfo['id'];
            $_SESSION['name'] =  $userInfo['name'];
            $_SESSION['email'] =  $userInfo['email'];
            $_SESSION['picture'] =  $userInfo['picture'];
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

    <title>Agencia de Viajes EMN</title>
</head>

<body>
    <?php include_once 'componentes/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <?php
                //Boton Nuevo Paquete
                if (isset($_SESSION['usuario'])) {
                    echo '<br>';
                    echo '<a href="paquetenuevo.php" class="btn btn-success float-right">Nuevo Paquete</a>';
                }

                ?>
            </div>

        </div>
        <div class="row">
            <div class="col-9">
                <br>
                <h3>Paquetes Turísticos</h3>
                <p>Explora los mejores destinos turísticos con nosotros.</p>
                <?php include 'componentes/paquetes.php'; ?>
            </div>
            <div class="col-3">
                <?php if (isset($_SESSION['id'])) : ?>
                    <h3>Mis Reservas</h3>

                    <?php

                    $cliente = new Cliente($db);
                    $clienteExistente = $cliente->validarSiExiste($_SESSION['email']);
                    $clienteId = $clienteExistente[0]['id'];

                    $reservas = $cliente->obtenerReservas($clienteId);

                    foreach ($reservas as $reserva) {
                        echo '<div class="card">';
                        echo '<div class="card-body">';

                        $paquete = $paquetes->obtenerPaquete($reserva['paquete_id']);
                        echo '<h5 class="card-title">' . $paquete[0]['nombre'] . '</h5>';
                        echo '<p class="card-text">Fecha: ' . $reserva['fecha_reserva'] . '</p>';
                        echo '<p class="card-text">Precio: $' . $paquete[0]['precio'] . '</p>';
                        echo '<p class="card-text">Estado: ' . $reserva['estado'] . '</p>';

                        //Formulario para cancelar reserva, si estado no es cancelado
                        if ($reserva['estado'] != 'Cancelado') {
                            echo '<form action="reservacancelar.php" method="POST">';
                            echo '<input type="hidden" name="reserva_id" value="' . $reserva['id'] . '">';
                            echo '<button type="submit" class="btn btn-danger">Cancelar</button>';
                            echo '</form>';
                        }
                        echo '</div>';
                        echo '</div>';
                        echo '<br>';
                    }

                    ?>

                <?php endif ?>
            </div>
        </div>

        <!-- Pie de página -->
        <footer>
            <p>&copy; 2024 Agencia de Viajes EMN. Todos los derechos reservados.</p>
        </footer>
    </div>
    <!-- Vincula los archivos JS de Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>