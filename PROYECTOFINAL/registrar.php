<?php

$email = $_POST['email'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];

require_once 'Modelos/Usuario.php';
require_once 'Modelos/Conexion.php';

$db = new Conexion();
$db = $db->conectar();

$usuario = new Usuario($db);
$usuario = $usuario->validarUsuario($email, $password);

//Si no existe el usuario, registrar
if (!$usuario) {
    $usuario = new Usuario($db);
    $usuario->guardarUsuario($nombre, $email, $password);
}

header('Location: registrarusuario.php');