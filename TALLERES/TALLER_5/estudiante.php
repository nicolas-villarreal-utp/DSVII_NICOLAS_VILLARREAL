<?php
/*
Clase Estudiante:
Atributos: id, nombre, edad, carrera, y un arreglo de materias con sus respectivas calificaciones.
Métodos:
Constructor que inicialice todos los atributos.
agregarMateria($materia, $calificacion): para añadir una materia y su calificación.
obtenerPromedio(): que calcule y retorne el promedio de calificaciones.
obtenerDetalles(): que retorne un arreglo asociativo con toda la información del estudiante.
*/

class Estudiante {
    public $id;
    public $nombre;
    public $edad;
    public $carrera;
    public $materias = [];

    public function __construct($id, $nombre, $edad, $carrera) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->carrera = $carrera;
    }

    public function agregarMateria($materia, $calificacion) {
        $this->materias[$materia] = $calificacion;
    }

    public function obtenerPromedio() {
        $total = 0;
        foreach ($this->materias as $calificacion) {
            $total += $calificacion;
        }
        return $total / count($this->materias);
    }

    public function obtenerDetalles() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'edad' => $this->edad,
            'carrera' => $this->carrera,
            'materias' => $this->materias,
            'promedio' => $this->obtenerPromedio()
        ];
    }

    //Guardar en el archivo JSON
    public function guardar() {
        $estudiantes = [];
        if (file_exists('estudiantes.json')) {
            $estudiantes = json_decode(file_get_contents('estudiantes.json'), true);
        }
        $estudiantes[] = $this->obtenerDetalles();
        file_put_contents('estudiantes.json', json_encode($estudiantes, JSON_PRETTY_PRINT));
    }

    //Buscar en el archivo JSON
    public static function buscar($id) {
        if (file_exists('estudiantes.json')) {
            $estudiantes = json_decode(file_get_contents('estudiantes.json'), true);
            foreach ($estudiantes as $estudiante) {
                if ($estudiante['id'] == $id) {
                    return $estudiante;
                }
            }
        }
        return null;
    }

}

?>