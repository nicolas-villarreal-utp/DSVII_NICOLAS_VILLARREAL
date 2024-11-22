<?php
// index.php
//session_start();

//si el method es GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    //Si tengo code de Google
    if (isset($_GET['code'])) {
        require_once 'vendor/autoload.php'; // Asegúrate de haber instalado el cliente de Google via Composer

        // Configuración de Google Client
        $client = new Google_Client();
        $client->setAuthConfig('config/google_credentials.json');
        $client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
        $client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
        $client->setRedirectUri('http://localhost/proyectofinal/index.php');

        // Obtener token de acceso
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $_SESSION['access_token'] = $token;

        //Guardar informacion del usuario en session
        $oauth = new Google_Service_Oauth2($client);
        $userInfo = $oauth->userinfo->get();
        $_SESSION['id'] =  $userInfo['id'];
        $_SESSION['name'] =  $userInfo['name'];
        $_SESSION['email'] =  $userInfo['email'];
        $_SESSION['picture'] =  $userInfo['picture'];
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

    require_once 'Modelos/Conexion.php';
    require_once 'Modelos/Usuario.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Conexion();
    $db = $db->conectar();

    $usuario = new Usuario($db);

    if ($usuario->validarUsuario($email, $password)) {

        session_start();

        $_SESSION['usuario'] = $email;

        header('Location: index.php');
    } else {
        echo 'Usuario o contraseña incorrectos <br>';
        //Regresar a la pagina de login
        echo '<a class="btn btn-primary" href="iniciarsesion.php">Regresar</a>';
    }
    

}
