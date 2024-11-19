<?php

session_start();

require_once 'database.php';
require_once 'modelos/LibroGuardado.php';

$libroguardadoId = $_POST['libroguardado_id'];

$database = new Database();
$db = $database->connect();

$libro = new LibroGuardado($db);
$libro->eliminarLibro($libroguardadoId);

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
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    Libro eliminado correctamente
                </div>

                <a href="index.php" class="btn btn-success">Volver a la página principal</a>
            </div>
        </div>
    </div>
</body>