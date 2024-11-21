<?php
// login.php
require_once 'vendor/autoload.php'; // Asegúrate de haber instalado el cliente de Google via Composer

session_start();

// Configuración de Google Client
$client = new Google_Client();
$client->setAuthConfig('google_credentials.json');
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->setRedirectUri('http://localhost/tu-aplicacion/login.php');

// Verificar si ya hay un token de acceso en la sesión
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $_SESSION['access_token'] = $token;

    // Redirigir al usuario a home.php
    header('Location: home.php');
    exit();
}

// Si el usuario ya tiene un token de acceso, obtener la información del perfil
if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
    $client->setAccessToken($_SESSION['access_token']);
    $oauth = new Google_Service_Oauth2($client);
    $userInfo = $oauth->userinfo->get();

    // Guardar el usuario en la base de datos
    require_once 'Modelos/Cliente.php';
    require_once 'Modelos/Usuario.php';

    $cliente = new Cliente();
    $cliente->guardarCliente($userInfo['name'], $userInfo['email'], $userInfo['id']);

    $usuario = new Usuario();
    $usuario->guardarUsuario($userInfo['id'], $userInfo['email'], 1); // Rol de Cliente = 1

    // Redirigir a home.php
    header('Location: home.php');
    exit();
}

// Si no hay token, redirigir al inicio de sesión de Google
$authUrl = $client->createAuthUrl();
header("Location: " . $authUrl);
exit();
