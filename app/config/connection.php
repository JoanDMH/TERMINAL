<?php
class Connection
{
  public $host = 'localhost';
  public $dbname = 'terminal';
  public $port ="5432";
  public $user = 'postgres';
  public $password = '6303';
  public $driver = 'pgsql';
  public $connect;

  public static function getConnection()
  {
    try {
      $connection = new Connection();
      $connection->connect = new PDO("{$connection->driver}:host={$connection->host};port={$connection->port};dbname={$connection->dbname}", $connection->user, $connection->password);
      $connection->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $connection->connect;
      // echo "connection success";
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
      return null;
    }
  }
  public static function closeConnection() {
    // Corregir la propiedad aquí, cambiar self::$connect a $connection->connect
    $connection = new Connection();
    $connection->connect = null;
  }
}


//Connection::getConnection();