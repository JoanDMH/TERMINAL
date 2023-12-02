<?php
require_once "../../config/connection.php";



class CiudadModel {
    private $conn;

    public function __construct() {
        $this->conn = Connection::getConnection();
    }

    public function listarCiudades() {
        $stmt = $this->conn->prepare("SELECT * FROM ciudades");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function insertarCiudad($nombre) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO ciudades (nomb_ciud) VALUES (:nombre)");
            $stmt->bindParam(':nombre', $nombre);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Si hay un error, puedes manejarlo aquí
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public function obtenerCiudadPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM ciudades WHERE id_ciud = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function actualizarCiudad($id, $nombre) {
        $stmt = $this->conn->prepare("UPDATE ciudades SET nomb_ciud = :nombre WHERE id_ciud = :id");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function eliminarCiudad($id) {
        $stmt = $this->conn->prepare("DELETE FROM ciudades WHERE id_ciud = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function contarCiudades() {
        $stmt = $this->conn->prepare("SELECT COUNT(*) as total FROM ciudades");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result['total'];
    }
}
?>
