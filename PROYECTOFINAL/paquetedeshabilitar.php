<?php 

$paqueteId = $_POST['paquete_id'];

require_once 'Modelos/Paquetes.php';
require_once 'Modelos/Conexion.php';

$db = new Conexion();
$db = $db->conectar();

$paquetes = new Paquetes($db);
$paquetes->deshabilitarPaquete($paqueteId);

header('Location: index.php');