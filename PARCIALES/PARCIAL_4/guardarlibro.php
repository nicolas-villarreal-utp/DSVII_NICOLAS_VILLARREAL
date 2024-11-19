<?php
session_start();

require_once 'configuracion.php';
require_once 'database.php';
require_once 'modelos/LibroGuardado.php';
require_once 'api/GoogleBooksAPI.php';

$googleBooks = new GoogleBooksAPI($apiKey);

// Conectar a la base de datos
$database = new Database();
$db = $database->connect();

$googleBooksId = $_POST['google_books_id'];

// Guardar un libro para un usuario
$libro = new LibroGuardado($db);
//$libro->guardarLibro(1, "google_books_id_456", "Título del Libro", "Autor del Libro", "URL_de_imagen", "Reseña del libro");

$usuarioId = $_SESSION['user_id'];
$resenaPersonal = $_POST['resena_personal'];

if ($googleBooksId != 0) {
    $libro->guardarLibroDesdeGoogleBooks($googleBooks, $usuarioId, $googleBooksId, $resenaPersonal);
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
            <div class="col-12">
                <div class="alert alert-success" role="alert">
                    Libro Guardado correctamente
                </div>

                <a href="index.php" class="btn btn-success">Volver a la página principal</a>
            </div>
        </div>
    </div>
</body>