<?php

require_once 'vendor/autoload.php'; // Asegúrate de haber instalado el cliente de Google via Composer

// Configuración de Google Client
$client = new Google_Client();
$client->setAuthConfig('config/google_credentials.json');
$client->addScope(Google_Service_Oauth2::USERINFO_PROFILE);
$client->addScope(Google_Service_Oauth2::USERINFO_EMAIL);
$client->setRedirectUri('http://localhost/proyectofinal/index.php');