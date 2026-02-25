<?php
require_once __DIR__ . "/../models/SignupManager.php";

class SignupController
{

  public function signupPage()
  {
    $error_signup = null;
    if ($_SERVER["REQUEST_METHOD"] === 'POST') {
      if (isset($_POST['register'])) {

        if (
          !empty($_SERVER['REMOTE_ADDR']) && !empty($_POST['user_pseudo']) && !empty($_POST['user_gender']) && !empty($_POST['user_email']) && !empty($_POST['user_age']) && !empty($_POST['user_location'])
          && !empty($_POST['user_pass']) && !empty($_POST['user_verif_pass'])
        ) {
          $ip_originale = $_SERVER['REMOTE_ADDR'];
          if (filter_var($ip_originale, FILTER_VALIDATE_IP)) {
            $usr_ip = $ip_originale;
          } else {
            $usr_ip = "0.0.0.0";
          }
          $usr_name = htmlspecialchars($_POST['user_pseudo']);
          $usr_gender = $_POST['user_gender'];
          $usr_mail = filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL);
          $usr_age = $_POST['user_age'];
          $usr_location = htmlspecialchars($_POST['user_location']);
          $usr_pass = $_POST['user_pass'];
          $usr_verif_pass = htmlspecialchars($_POST['user_verif_pass']);
          $usr_secure_key = random_int(2000000, 9000000);
          $usr_dte_register = date("Y-m-d");

          if ($usr_pass !== $usr_verif_pass) {
            sleep(2);
            $error_signup = DataText::ERROR_SIGNUP;
          } elseif (strlen($usr_pass) < 8) {
            $error_signup = DataText::ERROR_SIGNUP;
          } else {
            $verif_usr_age = new DateTime($usr_age);
            $current_date = new DateTime();
            $age_calculator = $current_date->diff($verif_usr_age)->y;
            $crypted_password = password_hash($usr_pass, PASSWORD_ARGON2ID);

            $userManager = new SignupManager();
            if ($userManager->user_mail_verif($usr_mail)) {
              $error_signup = DataText::ERROR_SIGNUP;
            } else {
              $insert_usr_validate = $userManager->create(
                $usr_ip,
                $usr_name,
                $usr_gender,
                $usr_location,
                $age_calculator,
                $usr_mail,
                $crypted_password,
                $usr_secure_key,
                $usr_dte_register,
              );
              if ($insert_usr_validate) {
                header('Location: index.php?page=home');
              } else {
                $error_signup = DataText::ERROR_SIGNUP;
              }
            }
          }
        } else {
          $error_signup = DataText::ERROR_SIGNUP;
        }
      }
    }
    require_once __DIR__ . '/../views/layouts/signup.php';
  }
}
