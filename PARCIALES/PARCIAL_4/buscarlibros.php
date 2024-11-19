<?php session_start(); ?>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>PARCIAL 4</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

    <?php

    require_once 'configuracion.php';
    require_once 'database.php';
    require_once 'modelos/Usuario.php';
    require_once 'modelos/LibroGuardado.php';

    ?>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12" style="padding: 10px">
                <a class="btn btn-primary float-right" href="index.php">Regresar</a>
            </div>
        </div>
        <div class="row">
            <div class="col-3">

                <h1>Usuario</h1>
                <img src="<?php echo $_SESSION['user_image']; ?>" alt="Profile Picture">
                <p>Nombre: <?php echo $_SESSION['user_name']; ?></p>
                <p>Email: <?php echo $_SESSION['user_email_address']; ?></p>
                <p>Google ID: <?php echo $_SESSION['user_google_id']; ?></p>

                <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
            </div>
            <div class="col-9">

                <?php
                require_once 'api/GoogleBooksAPI.php';

                $query = $_POST['buscar'];

                $googleBooks = new GoogleBooksAPI($apiKey);
                $resultados = $googleBooks->buscarLibros($query);

                // Mostrar resultados de búsqueda
                if (isset($resultados)) {
                    foreach ($resultados['items'] as $item) {

                ?>
                        <div class="card" style="margin: 10px">
                            <img class="card-img-top" style="padding: 10px; max-height: 200px; object-fit: contain" src="<?php echo $item['volumeInfo']['imageLinks']['thumbnail'] ?>" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['volumeInfo']['title'] ?></h5>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    <?php
                                    if (isset($item['volumeInfo']['authors'])) {
                                        echo "Autor: " . implode(", ", $item['volumeInfo']['authors']) . "<br>";
                                    }
                                    ?>
                                </h6>
                                <p class="card-text">
                                    <?php
                                    if (isset($item['volumeInfo']['description'])) {
                                        //echo "Descripción: " . $item['volumeInfo']['description'] . "<br><br>";
                                    }
                                    ?>
                                </p>
                            </div>

                            <form action="guardarlibro.php" method="post" style="padding: 10px;">

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Reseña Personal</label>
                                    <textarea name="resena_personal" id="resena_personal" class="form-control" rows="3"></textarea>
                                </div>

                                <input type="hidden" name="google_books_id" value="<?php echo $item['id']; ?>">
                                <input type="hidden" name="titulo" value="<?php echo $item['volumeInfo']['title']; ?>">
                                <input type="hidden" name="autor" value="<?php echo implode(", ", $item['volumeInfo']['authors']); ?>">
                                <input type="hidden" name="imagen" value="<?php echo $item['volumeInfo']['imageLinks']['thumbnail']; ?>">
                                <input type="hidden" name="resena" value="<?php echo isset($item['volumeInfo']['description']) ? $item['volumeInfo']['description'] : ''; ?>">
                                <button type="submit" class="btn btn-success float-right">Guardar Libro</button>
                            </form>
                        </div>

                <?php
                    }
                }
                ?>

            </div>

        </div>
    </div>
</body>