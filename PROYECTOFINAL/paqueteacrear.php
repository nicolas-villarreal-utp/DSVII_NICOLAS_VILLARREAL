<?php 

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$ubicacion = $_POST['ubicacion'];
$disponibilidad = $_POST['disponibilidad'];
$fechaInicio = $_POST['fecha_inicio'];
$fechaFin = $_POST['fecha_fin'];

//Imagen
$imagen = $_FILES['imagen'];

//Guardar la Imagen en la carpeta images
if ($imagen['name'] != '') {
    $imagenUrl = 'images/' . $imagen['name'];
    move_uploaded_file($imagen['tmp_name'], $imagenUrl);
} else {
    $imagenUrl = $_POST['imagen_url'];
}

require_once 'Modelos/Paquetes.php';
require_once 'Modelos/Conexion.php';

$db = new Conexion();
$db = $db->conectar();

$paquetes = new Paquetes($db);
$paquetes->guardarPaquete($nombre, $descripcion, $precio, $ubicacion, $disponibilidad, $fechaInicio, $fechaFin, $imagenUrl);

header('Location: index.php');