<section class="globale__container">
  <h2 class="globale__sub--title"><?= DataText::SIGNUP_SUBTITLE ?></h2>
  <fieldset>
    <?php
    if (isset($error_signup)) {
    ?>
      <legend><?= htmlspecialchars($error_signup) ?></legend>
    <?php
    }
    ?>
    <form method="post">
      <input type="text" name="user_pseudo" placeholder="Nom" required>
      <input type="email" name="user_email" placeholder="e-mail" required>
      <input type="date" name="user_age" required>
      <label for="H">H</label>
      <input type="radio" name="user_gender" id="H" value="H" required>
      <label for="F">F</label>
      <input type="radio" name="user_gender" id="F" value="F" required>
      <label for="usr_local">Location</label>
      <select name="user_location" id="usr_local">
        <option selected>...</option>
        <option value="Bruxelles">Bruxelles</option>
        <option value="Charleroi">Charleroi</option>
        <option value="Liège">Liège</option>
        <option value="Anvers">Anvers</option>
      </select>
      <input type="password" name="user_pass" placeholder="password" minlength="8" required>
      <input type="password" name="user_verif_pass" placeholder="confirm password" required>
      <input type="submit" name="register" value="Signup">
    </form>
  </fieldset>
</section>