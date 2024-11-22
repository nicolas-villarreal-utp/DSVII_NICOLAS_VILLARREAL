<?php

session_start();

require_once 'Modelos/Conexion.php';
require_once 'Modelos/Paquetes.php';

$db = new Conexion();
$db = $db->conectar();

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Agencia de Viajes EMN</title>
</head>

<body>
    <?php include_once 'componentes/navbar.php'; ?>

    <div class="container">
        <div class="row">
            <div class="col-6">
                <br>
                <?php if (isset($_SESSION['id'])) : ?>

                    <?php
                    require_once 'Modelos/Paquetes.php';

                    $paqueteId = $_GET['id'];

                    $paquetes = new Paquetes($db);
                    $listaPaquetes = $paquetes->obtenerPaquete($paqueteId);

                    //Fechas Disponibles
                    $fechasDisponibles = $paquetes->obtenerFechasDisponiblesPorPaquete($paqueteId);

                    //echo print_r($fechasDisponibles);

                    $fechaSelecionada = $_GET['fecha'];

                    if (isset($fechaSelecionada)) {
                        echo '<h3>Validar datos de la Reservar</h3>';
                        echo '<p>Fecha Seleccionada: ' . $fechaSelecionada . '</p>';

                        //Nombre
                        $nombre = $_SESSION['name'];
                        //Email
                        $email = $_SESSION['email'];
                        //Paquete
                        $paquete = $listaPaquetes[0]['nombre'];
                        //Precio
                        $precio = $listaPaquetes[0]['precio'];

                        echo '<p>Nombre: ' . $nombre . '</p>';
                        echo '<p>Email: ' . $email . '</p>';
                        echo '<p>Paquete: ' . $paquete . '</p>';
                        echo '<p>Precio: $' . $precio . '</p>';
                    } else {
                        echo '<h3>Reservar</h3>';
                        echo '<h3>Selecciona una Fecha Disponible</h3>';
                        echo '<ul>';

                        foreach ($fechasDisponibles as $fecha) {
                            echo '<li><a href="reservar.php?id=' . $paqueteId . '&fecha=' . $fecha . '">' . $fecha . '</a></li>';
                        }
                        echo '</ul>';
                    }
                    ?>
                    <br>
                    <form action="reservacrear.php" method="POST">
                        <input type="hidden" name="paquete_id" value="<?php echo $paqueteId ?>">
                        <input type="hidden" name="fecha_reserva" value="<?php echo $fechaSelecionada ?>">
                        <input type="hidden" name="cliente_id" value="<?php echo $_SESSION['id']?>">
                        <input type="hidden" name="email" value="<?php echo $email ?>">
                        <button type="submit" class="btn btn-success">Reservar</button>
                <?php else : ?>
                    <h3>Debes Iniciar Sesión para Reservar</h3>
                    <a class="btn btn-success" href="<?php echo $client->createAuthUrl() ?>">Ingresar con Google</a>
                <?php endif ?>
            </div>
            <div class="col-6">
                <br>
                <h3>Reservar este Paquete Turístico.</h3>
                <?php

                //print_r($listaPaquetes);

                foreach ($listaPaquetes as $paquete) {
                    echo '<div class="col-md-12">';
                    echo '<div class="card">';
                    echo '<img src="' . $paquete['imagen_url'] . '" class="card-img-top" alt="' . $paquete['nombre'] . '">';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title">' . $paquete['nombre'] . '</h5>';
                    echo '<p class="card-text">' . $paquete['descripcion'] . '</p>';
                    echo '<p class="card-text">Precio: $' . $paquete['precio'] . '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '<br>';
                }

                ?>

            </div>

        </div>

        <!-- Pie de página -->
        <footer>
            <p>&copy; 2024 Agencia de Viajes EMN. Todos los derechos reservados.</p>
        </footer>
    </div>

    <!-- Vincula los archivos JS de Bootstrap 4 -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>