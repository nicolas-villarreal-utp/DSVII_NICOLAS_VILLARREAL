<?php

include 'datos.php';

//Consultar si existe un usuario en session
session_start();

//print_r($_SESSION);

if (!isset($_SESSION['usuario'])) {
    //header('Location: login.php');
} else {
    $usuario = $_SESSION['usuario'];
    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <title>Calificaciones</title>
</head>

<body>
    <div class="container">

        <?php

        $datos = new Datos();

        if ($rol == 'profesor') {
            //tabla de Calificaciones de todos los estudiantes
            echo '<h1>Calificaciones de Estudiantes</h1>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Parcial 1</th>';
            echo '<th>Parcial 2</th>';
            echo '<th>Parcial 3</th>';
            echo '<th>Parcial 4</th>';
            echo '<th>Parcial 5</th>';
            echo '</tr>';
            foreach ($datos->estudiantes as $estudiante) {
                echo '<tr>';
                echo '<td>' . $estudiante['nombre'] . '</td>';
                echo '<td>' . $estudiante['calificaciones']['Parcial 1'] . '</td>';
                echo '<td>' . $estudiante['calificaciones']['Parcial 2'] . '</td>';
                echo '<td>' . $estudiante['calificaciones']['Parcial 3'] . '</td>';
                echo '<td>' . $estudiante['calificaciones']['Parcial 4'] . '</td>';
                echo '<td>' . $estudiante['calificaciones']['Parcial 5'] . '</td>';
                echo '</tr>';
            }
            echo '</table>';
        } else if ($rol == 'estudiante') {
            //tabla de Calificaciones del estudiante
            echo '<h1>Mis Calificaciones</h1>';
            echo '<table border="1">';
            echo '<tr>';
            echo '<th>Nombre</th>';
            echo '<th>Parcial 1</th>';
            echo '<th>Parcial 2</th>';
            echo '<th>Parcial 3</th>';
            echo '<th>Parcial 4</th>';
            echo '<th>Parcial 5</th>';
            echo '</tr>';
            foreach ($datos->estudiantes as $estudiante) {
                if ($estudiante['correo'] == $usuario) {
                    echo '<tr>';
                    echo '<td>' . $estudiante['nombre'] . '</td>';
                    echo '<td>' . $estudiante['calificaciones']['Parcial 1'] . '</td>';
                    echo '<td>' . $estudiante['calificaciones']['Parcial 2'] . '</td>';
                    echo '<td>' . $estudiante['calificaciones']['Parcial 3'] . '</td>';
                    echo '<td>' . $estudiante['calificaciones']['Parcial 4'] . '</td>';
                    echo '<td>' . $estudiante['calificaciones']['Parcial 5'] . '</td>';
                    echo '</tr>';
                }
            }
            echo '</table>';
        } else {
        }


        ?>
        <br>
        <hr>
        <br>
        <a class="btn btn-danger" href="logout.php">Cerrar Sesión</a>
    </div>
</body>

</html>