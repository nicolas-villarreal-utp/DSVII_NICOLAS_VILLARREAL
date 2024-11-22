<?php

class Reserva
{

    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }


    public function crearReserva($paqueteId, $fechaReserva, $clienteId)
    {
        $stmt = $this->conn->prepare("INSERT INTO reservas (paquete_id, fecha_reserva, cliente_id) VALUES (:paqueteId, :fechaReserva, :clienteId)");
        $stmt->bindParam(":paqueteId", $paqueteId, PDO::PARAM_INT);
        $stmt->bindParam(":fechaReserva", $fechaReserva);
        $stmt->bindParam(":clienteId", $clienteId, PDO::PARAM_INT);
        
        $stmt->execute();
    }

    public function cancelarReserva($reservaId){
        $stmt = $this->conn->prepare("UPDATE reservas SET estado = 'Cancelado' WHERE id = :reservaId");
        $stmt->bindParam(":reservaId", $reservaId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function confirmarReserva($reservaId){
        $stmt = $this->conn->prepare("UPDATE reservas SET estado = 'Confirmado' WHERE id = :reservaId");
        $stmt->bindParam(":reservaId", $reservaId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function obtenerReservas()
    {
        $stmt = $this->conn->prepare("SELECT * FROM reservas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}
