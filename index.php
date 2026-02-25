<?php
session_start();
require __DIR__ . "/app/config/security/csp.php";
header("Content-Security-Policy:" . $csp);// Autorise uniquement les scripts de votre propre domaine (à configurer pour CDN et API)
header("X-Frame-Options: DENY");// Empêche l'affichage de votre site dans une iframe (anti-clickjacking)
header("X-Content-Type-Options: nosniff"); // Empêche l'interprétation de fichiers MIME non déclarés
require_once 'app/config/database.php';
require_once __DIR__ . '/app/config/DataText.php'; 
?>

<!DOCTYPE html>
<html lang="fr">
<?php
require "app/views/partials/_head.php";
?>

<body>
  <?php
  require "app/views/partials/_header.php";
  ?>
  <main>
    <?php
    require "public/main.php";
    ?>
  </main>
  <?php
  require "app/views/partials/_footer.php";
  ?>
</body>

</html>