<?php
require_once '../../config/connection.php';

class BusesModel {
    public static function createBus($id_bus, $modelo, $capacidad, $id_tran) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("INSERT INTO buses (id_bus, modelo, capacidad, id_tran) VALUES (:id_bus, :modelo, :capacidad, :id_tran)");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':capacidad', $capacidad);
            $stmt->bindParam(':id_tran', $id_tran);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getBuses() {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("SELECT * FROM buses");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    // Funciones para actualizar y eliminar
    public static function updateBus($id_bus, $modelo, $capacidad, $id_tran) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("UPDATE buses SET modelo = :modelo, capacidad = :capacidad, id_tran = :id_tran WHERE id_bus = :id_bus");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':capacidad', $capacidad);
            $stmt->bindParam(':id_tran', $id_tran);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteBus($id_bus) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("DELETE FROM buses WHERE id_bus = :id_bus");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function getBusById($id_bus) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("SELECT * FROM buses WHERE id_bus = :id_bus");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $result;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }
}
?>
