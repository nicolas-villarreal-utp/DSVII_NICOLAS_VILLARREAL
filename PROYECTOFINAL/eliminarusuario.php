<?php 

$usuarioId = $_POST['id'];

require_once 'Modelos/Usuario.php';
require_once 'Modelos/Conexion.php';

$db = new Conexion();
$db = $db->conectar();

$usuarios = new Usuario($db);
$usuarios->eliminarUsuario($usuarioId);

header('Location: registrarusuario.php');