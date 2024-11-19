<?php

require_once 'vendor/autoload.php';

//leer secrets en json file
$secrets = json_decode(file_get_contents('secrets.json'), true);
$google_client_secret = $secrets['google_client_secret'];
$google_books_secret = $secrets['google_books_secret'];

$clientID = '486600931595-dfq94aso1nmuk3imhbv91ott7fqemh5e.apps.googleusercontent.com';
$clientSecret = $google_client_secret;
$redirectUri = 'http://localhost/PARCIALES/PARCIAL_4/index.php';
$apiKey = $google_books_secret;

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

