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

// 4. Procesar la opción seleccionada
switch ($opcion) {
    case 1:
        // Agregar estudiante
        $id = readline("Ingrese el ID del estudiante: ");
        $nombre = readline("Ingrese el nombre del estudiante: ");
        $edad = readline("Ingrese la edad del estudiante: ");
        $carrera = readline("Ingrese la carrera del estudiante: ");

        $estudiante = new Estudiante($id, $nombre, $edad, $carrera);

        $materias = [];
        do {
            $materia = readline("Ingrese el nombre de la materia (o 'fin' para terminar): ");
            if ($materia != 'fin') {
                $calificacion = readline("Ingrese la calificación de la materia: ");
                $estudiante->agregarMateria($materia, $calificacion);
            }
        } while ($materia != 'fin');

        $estudiante->guardar();
        break;
    case 2:
        // Buscar estudiante
        $id = readline("Ingrese el ID del estudiante a buscar: ");
        $encontrado = false;
        foreach ($estudiantes as $estudiante) {
            if ($estudiante['id'] == $id) {
                echo "Estudiante encontrado:\n";
                echo "ID: " . $estudiante['id'] . "\n";
                echo "Nombre: " . $estudiante['nombre'] . "\n";
                echo "Edad: " . $estudiante['edad'] . "\n";
                echo "Carrera: " . $estudiante['carrera'] . "\n";
                echo "Materias:\n";
                foreach ($estudiante['materias'] as $materia => $calificacion) {
                    echo "- $materia: $calificacion\n";
                }
                echo "Promedio: " . $estudiante['promedio'] . "\n";
                $encontrado = true;
                break;
            }
        }
        if (!$encontrado) {
            echo "Estudiante no encontrado.\n";
        }
        break;
    case 3:
        // Generar reporte
        foreach ($estudiantes as $estudiante) {
            echo "ID: " . $estudiante['id'] . "\n";
            echo "Nombre: " . $estudiante['nombre'] . "\n";
            echo "Edad: " . $estudiante['edad'] . "\n";
            echo "Carrera: " . $estudiante['carrera'] . "\n";
            echo "Materias:\n";
            foreach ($estudiante['materias'] as $materia => $calificacion) {
                echo "- $materia: $calificacion\n";
            }
            echo "Promedio: " . $estudiante['promedio'] . "\n";
            echo "--------------------------------\n";
        }
        break;
        
?>