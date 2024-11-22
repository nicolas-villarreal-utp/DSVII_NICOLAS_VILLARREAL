<?php

//POST para Crear reserva
if ($_POST) {
    include_once 'Modelos/Reserva.php';
    include_once 'Modelos/Conexion.php';

    $db = new Conexion();
    $db = $db->conectar();

    $reserva = new Reserva($db);
    $reservaId = $_POST['reserva_id'];
    $reserva->cancelarReserva($reservaId);

    header('Location: index.php');
}