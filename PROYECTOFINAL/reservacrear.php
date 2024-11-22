<?php

//POST para Crear reserva
if ($_POST) {
    include_once 'Modelos/Reserva.php';
    include_once 'Modelos/Paquetes.php';
    include_once 'Modelos/Conexion.php';
    include_once 'Modelos/Cliente.php'; 

    $db = new Conexion();
    $db = $db->conectar();

    $reserva = new Reserva($db);
    $paquete = new Paquetes($db);

    $paqueteId = $_POST['paquete_id'];
    $fechaReserva = $_POST['fecha_reserva'];
    $clienteId = $_POST['cliente_id'];
    $email = $_POST['email'];

    $cliente = new Cliente($db);
    $clienteExistente = $cliente->validarSiExiste($email);
    $clienteId = $clienteExistente[0]['id'];

    $reserva->crearReserva($paqueteId, $fechaReserva, $clienteId);

    header('Location: index.php');
}