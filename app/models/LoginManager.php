<?php
require_once __DIR__ . "/../config/database.php";

class LoginManager
{

  private $bdd;

  public function __construct()
  {
    $database = new Ucrush_db();
    $this->bdd = $database->getConnection();
  }

  public function login_user(string $email): array|bool
  {
    try {
      
      $req_login = "CALL login_user(:mail)";
      $req_login_action = $this->bdd->prepare($req_login);
      $req_login_action->execute([':mail' => $email]);

      return $req_login_action->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
      return false;
    }
  }
}
