<?php
class DB
{
  // Localhost
  private $host = 'localhost';
  private $db   = 'stripe_users';
  private $user = 'root';
  private $pass = 'root';
  private $port = '8889';
  private $charset = 'utf8mb4';

  protected $conn;

  public function __construct() {
    try {
      $dsn = "mysql:host=".$this->host.";dbname=".$this->db.";port=".$this->port.";charset=".$this->charset;
      $this->conn = new PDO($dsn, $this->user, $this->pass);
    } catch (\PDOException $e) {
      throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }
  }

  public function connect(){
    return $this->conn;
  }
}

?>