<?php
require_once __DIR__ . "/../models/ProfilManager.php";

class ProfilController
{

  public function profilPage()
  {
    $userId = $_SESSION['user_data']['usrId'];
    $error_update = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['profile_update'])) {

      if (!empty($_POST['user_location']) || !empty($_FILES['profile_avatar']['name'])) {

        $new_user_location = htmlspecialchars($_POST['user_location']);

        if (!empty($_FILES['profile_avatar']['name'])) {
          $avatar_img = $_FILES['profile_avatar'];
          $avatar_extension = strtolower(pathinfo($avatar_img['name'], PATHINFO_EXTENSION));

          $upload_route = 'public/uploads/avatars/';
          $avatar_name = $userId . '.' . $avatar_extension;
          $complete_route = $upload_route . $avatar_name;

          $authorized_types = ["image/png", "image/jpeg", "image/webp"];

          if (in_array($avatar_img["type"], $authorized_types)) {
            foreach (['jpg', 'jpeg', 'png', 'webp'] as $ext) {
              if (file_exists($upload_route . $userId . '.' . $ext)) {
                unlink($upload_route . $userId . '.' . $ext);
              }
            }

            if (move_uploaded_file($avatar_img['tmp_name'], $complete_route)) {
              $_SESSION['user_data']['usrAvatar'] = 1;
            }
          }
        }

        $profil_manager = new ProfilManager();
        if ($profil_manager->updateUserProfil($userId, $new_user_location)) {
          $_SESSION['user_data']['usrLocation'] = $new_user_location;
          header("Location: index.php?page=profil&success=1");
          exit();
        }
      } else {
        $error_update = DataText::ERROR_PROFIL_UPDATE;
      }
    }
    require_once __DIR__ . '/../views/layouts/profil.php';
  }
}
