<?php
require_once __DIR__ . "/../models/LoginManager.php";

class LoginController
{
  public function loginPage()
  {
    $error_login = null;

    if ($_SERVER["REQUEST_METHOD"] === 'POST' && isset($_POST['login'])) {

      if (!empty($_POST['user_log_email']) && !empty($_POST['user_log_pass'])) {
        
        $usr_log_mail = filter_var($_POST['user_log_email'], FILTER_VALIDATE_EMAIL);
        $usr_log_pass = $_POST['user_log_pass']; 

        $loginManager = new LoginManager();
        $user = $loginManager->login_user($usr_log_mail);

        if ($user && password_verify($usr_log_pass, $user['user_password'])) {
           if (session_status() === PHP_SESSION_NONE) session_start();
     
            $_SESSION['usr_auth'] = true;
            $_SESSION['user_data'] = [
              "usrId" => $user['user_id'],
              "usrName" => $user['user_name'],
              "usrGender" => $user['user_gender'],
              "usrLocation" => $user['user_location'],
              "usrAvatar" => $user['user_avatar'],
              "usrSecureKey" => $user['user_key'],
            ];

            header("Location: index.php?page=profil");
            exit();
            
        } else {
            sleep(2); 
            $error_login = DataText::ERROR_LOGIN;
        }
      } else {
        $error_login = DataText::ERROR_LOGIN;
      }
    }
    require_once __DIR__ . '/../views/layouts/login.php';
  }
}
