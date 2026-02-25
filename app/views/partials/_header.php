<header>
  <h1 class="Primary__title"><?= DataText::PRIMARY_TITLE ?></h1>
  <nav>
    <ul>
      <?php
      if (isset($_SESSION['usr_auth']) && isset($_SESSION['user_data']['usrSecureKey'])) {
      ?>
        <li class="nav__el"><a href="index.php?page=home"><?= DataText::HOME_LINK ?></a></li>
        <li class="nav__el"><a href="index.php?page=user"><?= DataText::USER_LINK ?></a></li>
        <li class="nav__el"><a href="index.php?page=profil"><?= DataText::PROFIL_LINK ?></a></li>
        <li class="nav__el"><a href="index.php?page=logout"><?= DataText::LOGOUT_LINK ?></a></li>
      <?php
      } else {
      ?>
        <li class="nav__el"><a href="index.php?page=login"><?= DataText::LOGIN_LINK ?></a></li>
        <li class="nav__el"><a href="index.php?page=signup"><?= DataText::SIGNUP_LINK ?></a></li>
      <?php
      }
      ?>
    </ul>
  </nav>
</header>