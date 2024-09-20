<?php

/*
Implementa un sistema de persistencia simple que guarde y cargue los datos de los estudiantes en un archivo JSON.
Crea una interfaz de línea de comandos simple que permita interactuar con el sistema (agregar estudiantes, buscar, generar reportes, etc.).
Implementa un sistema de validación de datos para asegurar que la información ingresada sea correcta (por ejemplo, calificaciones entre 0 y 100, edades válidas, etc.).
*/

// 1. Cargar los datos de los estudiantes
$estudiantes = [];
if (file_exists('estudiantes.json')) {
    $estudiantes = json_decode(file_get_contents('estudiantes.json'), true);
}

// 2. Mostrar el menú de opciones
echo "Menú de opciones:\n";
echo "1. Agregar estudiante\n";
echo "2. Buscar estudiante\n";
echo "3. Generar reporte\n";
echo "4. Salir\n";

// 3. Solicitar la opción al usuario
$opcion = readline("Seleccione una opción: ");


?>