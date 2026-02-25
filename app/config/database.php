<?php
class Ucrush_db
{

  private $host = "localhost";
  private $dbname = "ucrush";
  private $username = "root";
  private $password = "";
  private $connexion;

  public function __construct()
  {
    try {
      $this->connexion = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
      ]);
    } catch (PDOException $e) {
      die("Connexion ERROR" . $e->getMessage());
    }
  }

  public function getConnection()
  {
    return $this->connexion;
  }
}

$db = new Ucrush_db();

$bdd = $db->getConnection();
