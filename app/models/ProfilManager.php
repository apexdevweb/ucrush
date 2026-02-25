<?php
require_once __DIR__ . "/../config/database.php";

class ProfilManager
{
  private $bdd;

  public function __construct()
  {
    $database = new Ucrush_db();
    $this->bdd = $database->getConnection();
  }

  public function updateUserProfil(int $userId, string $location): bool
  {
    try {
      $req_user_update = "CALL update_profil(:id, :location)";
      $update_action = $this->bdd->prepare($req_user_update);

      return $update_action->execute([
        ':id'       => $userId,
        ':location' => $location
      ]);
    } catch (PDOException $e) {
      return false;
    }
  }
}
