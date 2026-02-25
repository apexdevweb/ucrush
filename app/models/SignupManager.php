<?php
require_once __DIR__ . "/../config/database.php";

class SignupManager
{
  private $bdd;

  public function __construct()
  {
    $database = new Ucrush_db();
    $this->bdd = $database->getConnection();
  }

  public function user_mail_verif(string $email): bool
  {
    try {
      $req_verif_user = "CALL userMailVerif(:mail)";
      $req_verif_action = $this->bdd->prepare($req_verif_user);
      $req_verif_action->execute([':mail' => $email]);

      $verif_data =  $req_verif_action->fetchColumn();
      $req_verif_action->closeCursor();
      return (int)$verif_data > 0;
    
    } catch (PDOException $e) {
      return false;
    }
  }

  public function create(string $ip, string $pseudo, string $genre, string $localisation, string $age, string $email, string $mdp, int $cle, string $dteRegister): bool
  {
    try {
      $req_user_insert = "CALL signup_user(:ip, :name, :gender, :location, :age, :mail, :pass, :key, :dateRegister)";
      $req_insert_action = $this->bdd->prepare($req_user_insert);

      return $req_insert_action->execute([
        ':ip' => $ip,
        ':name' => $pseudo,
        ':gender' => $genre,
        ':location' => $localisation,
        ':age' => $age,
        ':mail' => $email,
        ':pass' => $mdp,
        ':key' => $cle,
        ':dateRegister' => $dteRegister,
      ]);
    } catch (PDOException $e) {
      return false;
    }
  }
}
