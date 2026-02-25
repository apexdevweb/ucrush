<?php

const AVAILABLE_ROUTES = [
  'home' => 'HomeController',
  'user' => 'UserController',
  'profil' => 'ProfilController',
  'login' => 'LoginController',
  'signup' => 'SignupController',
  'logout' => 'LogoutController',
];
//on récupère la page
if (isset($_GET['page'])) {
  $page = $_GET['page'];
} else {
  $page = 'home';
}
//si jamais la page n'existe pas on redirige sur 'home' automatiquement
if (!array_key_exists($page, AVAILABLE_ROUTES)) {
  $page = 'home';
}

//on stocke les pages avec connexion requise dans un tableau
$protected_private_page = ['profil', 'user', 'logout'];

//on verifie que la page demander par l'utilisateur figure biens dans le tableau
if (in_array($page, $protected_private_page)) {
  //si la session n'est pas vérifier on l'envoi sur la page login
  if (!isset($_SESSION['usr_auth']) || !isset($_SESSION['user_data']['usrSecureKey'])) {
    header("Location: index.php?page=login");
    exit();
  }
}

//on charge le fichier controller en placant le chemin dans des variables
$controllerName = AVAILABLE_ROUTES[$page];
$controllerFile = __DIR__ . '/../controllers/' . $controllerName . '.php';

//on vérifie que le fichier est existant
if (file_exists($controllerFile)) {
  //si le fichier existe on l'importe
   require_once $controllerFile;

   //on instancie et on appel la method
   $app = new $controllerName();

   if ($page === 'home') {
     $app->homePage();
   } elseif ($page === 'user') {
     $app->userPage();
   } elseif ($page === 'profil') {
     $app->profilPage();
   } elseif ($page === 'login') {
     $app->loginPage();
   } elseif ($page === 'signup') {
     $app->signupPage();
   } elseif ($page === 'logout') {
     $app->logoutPage();
   }
   
} else {
  echo "Controleur introuvable";
}







