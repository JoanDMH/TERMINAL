<?php
require_once '../../config/connection.php';

class ContratoModel {
    public static function getContratos() {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->query("SELECT * FROM contrato");
            $contratos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $contratos;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    public static function getContratoById($id_bus, $id_cond) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("SELECT * FROM contrato WHERE id_bus = :id_bus AND id_cond = :id_cond");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->bindParam(':id_cond', $id_cond);
            $stmt->execute();
            $contrato = $stmt->fetch(PDO::FETCH_ASSOC);
            Connection::closeConnection();
            return $contrato;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    public static function createContrato($id_bus, $id_cond, $fecha_ini, $fecha_fin) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("INSERT INTO contrato (id_bus, id_cond, fecha_ini, fecha_fin) VALUES (:id_bus, :id_cond, :fecha_ini, :fecha_fin)");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->bindParam(':id_cond', $id_cond);
            $stmt->bindParam(':fecha_ini', $fecha_ini);
            $stmt->bindParam(':fecha_fin', $fecha_fin);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function updateContrato($id_bus, $id_cond, $fecha_ini, $fecha_fin) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("UPDATE contrato SET fecha_ini = :fecha_ini, fecha_fin = :fecha_fin WHERE id_bus = :id_bus AND id_cond = :id_cond");
            $stmt->bindParam(':fecha_ini', $fecha_ini);
            $stmt->bindParam(':fecha_fin', $fecha_fin);
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->bindParam(':id_cond', $id_cond);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteContrato($id_bus, $id_cond) {
        try {
            $conn = Connection::getConnection();
            $stmt = $conn->prepare("DELETE FROM contrato WHERE id_bus = :id_bus AND id_cond = :id_cond");
            $stmt->bindParam(':id_bus', $id_bus);
            $stmt->bindParam(':id_cond', $id_cond);
            $stmt->execute();
            Connection::closeConnection();
            return true;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }

    // Agrega funciones adicionales según tus necesidades
    // En ContratoModel.php
    public static function getContratosActuales() {
        try {
            $connection = Connection::getConnection();
            $query = "SELECT * FROM contrato WHERE CURRENT_DATE BETWEEN fecha_ini AND fecha_fin";
            $result = $connection->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }

    
    
}
?>
