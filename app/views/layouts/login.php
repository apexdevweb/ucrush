<section class="globale__container">
  <h2 class="globale__sub--title"><?= DataText::LOGIN_SUBTITLE ?></h2>
  <fieldset>
    <?php
    if (isset($error_login)) {
    ?>
      <legend><?= htmlspecialchars($error_login) ?></legend>
    <?php
    }
    ?>
    <form method="post">
      <input type="email" name="user_log_email" placeholder="e-mail" required>
      <input type="password" name="user_log_pass" placeholder="password" minlength="8" required>
      <input type="submit" name="login" value="Login">
    </form>
  </fieldset>
</section>