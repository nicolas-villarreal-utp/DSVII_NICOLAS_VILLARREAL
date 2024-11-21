<?php
// Modelos/Conexion.php

class Conexion {
    public static function conectar() {
        // Cargar los datos de conexión desde el archivo JSON
        $config = json_decode(file_get_contents('config/db_config.json'), true);

        // Establecer la conexión usando los parámetros del archivo JSON
        $host = $config['host'];
        $username = $config['username'];
        $password = $config['password'];
        $dbname = $config['dbname'];

        // Crear la conexión
        $mysqli = new mysqli($host, $username, $password, $dbname);

        // Verificar si hubo un error en la conexión
        if ($mysqli->connect_error) {
            die("Conexión fallida: " . $mysqli->connect_error);
        }

        return $mysqli;
    }
}
