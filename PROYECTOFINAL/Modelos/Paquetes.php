<?php

class Paquetes
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function guardarPaquete($nombre, $descripcion, $precio, $ubicacion, $disponibilidad, $fechaInicio, $fechaFin, $imagenUrl)
    {
        $stmt = $this->conn->prepare("INSERT INTO paquetes (nombre, descripcion, precio, ubicacion, disponibilidad, fecha_inicio, fecha_fin, imagen_url) VALUES (:nombre, :descripcion, :precio, :ubicacion, :disponibilidad, :fechaInicio, :fechaFin, :imagenUrl)");

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":ubicacion", $ubicacion);
        $stmt->bindParam(":disponibilidad", $disponibilidad);
        $stmt->bindParam(":fechaInicio", $fechaInicio);
        $stmt->bindParam(":fechaFin", $fechaFin);
        $stmt->bindParam(":imagenUrl", $imagenUrl);

        $stmt->execute();
    }

    public function obtenerPaquetes()
    {

        $query = "SELECT * FROM paquetes";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function obtenerPaquetesDisponibles()
    {

        $query = "SELECT * FROM paquetes WHERE disponibilidad >= '1' ";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function obtenerPaquete($id)
    {
        try {
            $stmt = $this->conn->prepare("SELECT * FROM paquetes WHERE id = :id");
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function actualizarPaquete($id, $nombre, $descripcion, $precio, $ubicacion, $disponibilidad, $fechaInicio, $fechaFin, $imagenUrl)
    {

        $stmt = $this->conn->prepare("UPDATE paquetes SET nombre = :nombre, descripcion = :descripcion, precio = :precio, ubicacion = :ubicacion, disponibilidad = :disponibilidad, fecha_inicio = :fechaInicio, fecha_fin = :fechaFin, imagen_url = :imagenUrl WHERE id = :id");

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":ubicacion", $ubicacion);
        $stmt->bindParam(":disponibilidad", $disponibilidad);
        $stmt->bindParam(":fechaInicio", $fechaInicio);
        $stmt->bindParam(":fechaFin", $fechaFin);
        $stmt->bindParam(":imagenUrl", $imagenUrl);
        $stmt->bindParam(":id", $id);

        $stmt->execute();
    }

    public function eliminarPaquete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM paquetes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerFechasDisponiblesPorPaquete($paqueteId)
    {

        $paquete = $this->obtenerPaquete($paqueteId);

        $fecha_inicio_paquete = $paquete[0]['fecha_inicio'];
        $fecha_fin_paquete = $paquete[0]['fecha_fin'];

        // Consultamos las fechas reservadas
        $sql = "SELECT fecha_reserva FROM reservas WHERE fecha_reserva BETWEEN :fecha_inicio_paquete AND :fecha_fin_paquete and estado = 'Confirmado'";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':fecha_inicio_paquete', $fecha_inicio_paquete);
        $stmt->bindParam(':fecha_fin_paquete', $fecha_fin_paquete);
        $stmt->execute();

        // Almacenamos las fechas reservadas
        $fechas_reservadas = $stmt->fetchAll(PDO::FETCH_COLUMN);

        // Array para las fechas disponibles
        $fechas_disponibles = [];

        // Creamos un objeto DateTime para la fecha de inicio y fin
        $current_date = new DateTime($fecha_inicio_paquete);
        $end_date = new DateTime($fecha_fin_paquete);

        // Recorremos el rango de fechas
        while ($current_date <= $end_date) {
            // Comprobamos si la fecha está reservada
            if (!in_array($current_date->format('Y-m-d'), $fechas_reservadas)) {
                // Si no está reservada, la agregamos al array de fechas disponibles
                $fechas_disponibles[] = $current_date->format('Y-m-d');
            }
            // Avanzamos un día
            $current_date->modify('+1 day');
        }

        return $fechas_disponibles;
    }

    function deshabilitarPaquete($paqueteId)
    {
        $stmt = $this->conn->prepare("UPDATE paquetes SET disponibilidad = 0 WHERE id = :Id");
        $stmt->bindParam(":Id", $paqueteId, PDO::PARAM_INT);
        $stmt->execute();
    }

    function habilitarPaquete($paqueteId)
    {
        $stmt = $this->conn->prepare("UPDATE paquetes SET disponibilidad = 1 WHERE id = :Id");
        $stmt->bindParam(":Id", $paqueteId, PDO::PARAM_INT);
        $stmt->execute();
    }
}
