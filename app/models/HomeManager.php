<?php
require_once __DIR__ . "/../config/database.php";

class HomeManager
{
  private $bdd;

  public function __construct()
  {
    $database = new Ucrush_db();
    $this->bdd = $database->getConnection();
  }

  public function getAllmens(): array|bool
  {
    try {
        $req_get_men = "CALL get_all_men()";
        $action_get_men = $this->bdd->prepare($req_get_men);
        $action_get_men->execute();

        return $action_get_men->fetchAll(PDO::FETCH_ASSOC);
 
    } catch (PDOException $e) {
      return false;
    }
  }

  public function getAllwomen():  array|bool
  {
    try {
        $req_get_women = "CALL get_all_women()";
        $action_get_women = $this->bdd->prepare($req_get_women);
        $action_get_women->execute();

        return $action_get_women->fetchAll(PDO::FETCH_ASSOC);
 
    } catch (PDOException $e) {
      return false;
    }
  }
}