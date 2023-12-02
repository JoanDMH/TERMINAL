<?php

class ConductorModel {
    public static function getAllConductores() {
        $connection = Connection::getConnection();

        if ($connection) {
            try {
                $query = "SELECT * FROM conductores";
                $statement = $connection->prepare($query);
                $statement->execute();

                return $statement->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }
        }

        return null;
    }

    public static function getConductorById($id) {
        $connection = Connection::getConnection();

        if ($connection) {
            try {
                $query = "SELECT * FROM conductores WHERE id_cond = :id";
                $statement = $connection->prepare($query);
                $statement->bindParam(':id', $id);
                $statement->execute();

                return $statement->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return null;
            }
        }

        return null;
    }

    public static function addConductor($data) {
        $connection = Connection::getConnection();
    
        if ($connection) {
            try {
                $query = "INSERT INTO conductores (id_cond, nomb_cond, apel_cond, cel, correo) VALUES (:id, :nombre, :apellido, :celular, :correo)";
                $statement = $connection->prepare($query);
                $statement->execute($data);
    
                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }
    
        return false;
    }

    public static function updateConductor($id, $data) {
        $connection = Connection::getConnection();

        if ($connection) {
            try {
                $query = "UPDATE conductores SET nomb_cond = :nombre, apel_cond = :apellido, cel = :celular, correo = :correo WHERE id_cond = :id";
                $statement = $connection->prepare($query);
                $data['id'] = $id;
                $statement->execute($data);

                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        return false;
    }

    public static function deleteConductor($id) {
        $connection = Connection::getConnection();

        if ($connection) {
            try {
                $query = "DELETE FROM conductores WHERE id_cond = :id";
                $statement = $connection->prepare($query);
                $statement->bindParam(':id', $id);
                $statement->execute();

                return true;
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

        return false;
    }
}
?>
