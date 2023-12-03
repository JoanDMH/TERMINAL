<?php
require_once '../../config/connection.php';
class TicketModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function insertarTicket($id_tick, $fecha, $id_cli, $id_ruta, $id_asiento) {
        try {
            $query = "INSERT INTO ticket (id_tick, fecha, id_cli, id_ruta, id_asiento) 
                      VALUES (:id_tick, :fecha, :id_cli, :id_ruta, :id_asiento)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_tick', $id_tick);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':id_cli', $id_cli);
            $stmt->bindParam(':id_ruta', $id_ruta);
            $stmt->bindParam(':id_asiento', $id_asiento);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar el ticket: " . $e->getMessage();
            return false;
        }
    }

    public function updateTicket($id_tick, $fecha, $id_cli, $id_ruta, $id_asiento) {
        try {
            $stmt = $this->db->prepare("UPDATE ticket 
                                       SET fecha = :fecha, id_cli = :id_cli, id_ruta = :id_ruta, id_asiento = :id_asiento 
                                       WHERE id_tick = :id_tick");
            $stmt->bindParam(':id_tick', $id_tick);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':id_cli', $id_cli);
            $stmt->bindParam(':id_ruta', $id_ruta);
            $stmt->bindParam(':id_asiento', $id_asiento);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar el ticket: " . $e->getMessage();
            return false;
        }
    }

    public function eliminarTicket($id_tick) {
        try {
            $stmt = $this->db->prepare("DELETE FROM ticket WHERE id_tick = :id_tick");
            $stmt->bindParam(':id_tick', $id_tick);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al eliminar el ticket: " . $e->getMessage();
            return false;
        }
    }

    public function getTicketById($id_tick) {
        try {
            $stmt = $this->db->prepare("SELECT * FROM ticket WHERE id_tick = :id_tick");
            $stmt->bindParam(':id_tick', $id_tick);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener el ticket: " . $e->getMessage();
            return null;
        }
    }

    public function getAllTickets() {
        try {
            $query = "SELECT * FROM ticket";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los tickets: " . $e->getMessage();
            return [];
        }
    }

    public function insertOrUpdateTicket($id_tick, $fecha, $id_cli, $id_ruta, $id_asiento) {
        try {
            // Verificar si el ticket ya existe
            $existingTicket = $this->getTicketById($id_tick);
    
            if ($existingTicket) {
                // Actualizar el ticket existente
                $query = "UPDATE ticket SET fecha = :fecha, id_cli = :id_cli, id_ruta = :id_ruta, id_asiento = :id_asiento WHERE id_tick = :id_tick";
            } else {
                // Insertar un nuevo ticket
                $query = "INSERT INTO ticket (id_tick, fecha, id_cli, id_ruta, id_asiento) VALUES (:id_tick, :fecha, :id_cli, :id_ruta, :id_asiento)";
            }
    
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_tick', $id_tick);
            $stmt->bindParam(':fecha', $fecha);
            $stmt->bindParam(':id_cli', $id_cli);
            $stmt->bindParam(':id_ruta', $id_ruta);
            $stmt->bindParam(':id_asiento', $id_asiento);
    
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error en PDO: " . $e->getMessage();
            return false;
        }
    }
    
    
}
?>
