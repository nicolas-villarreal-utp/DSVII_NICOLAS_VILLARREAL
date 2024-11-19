<?php

require_once 'vendor/autoload.php';

$clientID = '486600931595-dfq94aso1nmuk3imhbv91ott7fqemh5e.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/PARCIALES/PARCIAL_4/index.php';
$apiKey = "AIzaSyABvT2vt8rXi4AeXafKOC0Fr08nWsa96uo";

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");


