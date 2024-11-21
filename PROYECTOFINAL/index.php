<?php
// index.php
session_start();
if (!isset($_SESSION['access_token'])) {
    header('Location: login.php');
    exit();
}

// Si está autenticado, redirigir a home.php
header('Location: home.php');
exit();
