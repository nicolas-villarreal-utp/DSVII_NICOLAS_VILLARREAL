<?php
// Cargar las claves y secretos desde el archivo JSON
$config = json_decode(file_get_contents('config/google_credentials.json'), true);

define('GOOGLE_CLIENT_ID', $config['client_id']);
define('GOOGLE_CLIENT_SECRET', $config['client_secret']);
define('GOOGLE_REDIRECT_URI', $config['redirect_uri']);
