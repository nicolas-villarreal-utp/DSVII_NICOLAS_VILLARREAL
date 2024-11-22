<?php

require_once 'Modelos/Paquetes.php';

$paquetes = new Paquetes($db);

if(isset($_SESSION['usuario'])){
    $listaPaquetes = $paquetes->obtenerPaquetes();
}else{
    $listaPaquetes = $paquetes->obtenerPaquetesDisponibles();
}

foreach ($listaPaquetes as $paquete) {
    echo '<div class="col-md-12">';
    echo '<div class="card">';
    echo '<img src="' . $paquete['imagen_url'] . '" class="card-img-top" alt="' . $paquete['nombre'] . '">';
    echo '<div class="card-body">';
    echo '<h5 class="card-title">' . $paquete['nombre'] . '</h5>';
    echo '<p class="card-text">' . $paquete['descripcion'] . '</p>';
    echo '<p class="card-text">Precio: $' . $paquete['precio'] . '</p>';

    //Si el usuario está logueado, mostrar el botón de editar
    if (isset($_SESSION['usuario'])) {
        echo '<a href="paqueteeditar.php?id=' . $paquete['id'] . '" class="btn btn-warning float-right">Editar</a>';
        
        //Si el paquete esta disponible
        if ($paquete['disponibilidad'] == 1) {
            //Deshabilitar Paquete
            echo '<form action="paquetedeshabilitar.php" method="POST">';
            echo '<input type="hidden" name="paquete_id" value="' . $paquete['id'] . '">';
            echo '<button type="submit" class="btn btn-danger float-right">Deshabilitar</button>';
            echo '</form>';
        } else {
            //Habilitar Paquete
            echo '<form action="paquetehabilitar.php" method="POST">';
            echo '<input type="hidden" name="paquete_id" value="' . $paquete['id'] . '">';
            echo '<button type="submit" class="btn btn-success float-right">Habilitar</button>';
            echo '</form>';
        }

    } else {
        //Boton de reserva
        echo '<a href="reservar.php?id=' . $paquete['id'] . '" class="btn btn-primary float-right">Reservar</a>';
    }

    echo '</div>';
    echo '</div>';
    echo '</div>';
    echo '<br>';
}
