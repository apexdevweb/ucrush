<section class="globale__container">
  <h2 class="globale__sub--title"><?= DataText::PROFIL_SUBTITLE ?></h2>
  <div class="profil__wrapper">
    <article>
      <hgroup>
        <h3 class="personal__sub--title"><?= DataText::PERSONAL_PROFIL_TITLE ?></h3>
        <h4><?= htmlspecialchars($_SESSION['user_data']['usrName']) ?></h4>
      </hgroup>
      <figure>
        <?php
        if (!empty($_SESSION['user_data']['usrAvatar'])) {
        ?>
         <img src="<?= htmlspecialchars($_SESSION['user_data']['usrAvatar']) ?>" alt="profilImage" class="profil__avatar">
        <?php
          } else {
        ?>
         <img src="<?= DataText::PERSONAL_DEFAULT_AVATAR ?>" alt="profilImage" class="profil__avatar">
        <?php
          }
        ?>
        <figcaption><small>Current picture</small></figcaption>
      </figure>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Sit, magni eius beatae in id esse.</p>
    </article>
    <fieldset>
      <?php
      if (isset($error_update)) {
      ?>
        <legend><?= htmlspecialchars($error_update)?></legend>
      <?php
        }
      ?>
    <form method="post" enctype="multipart/form-data">
      <label for="usr_local">Change location (current: <?= htmlspecialchars($_SESSION['user_data']['usrLocation']) ?>)</label>
      <select name="user_location" id="usr_local">
        <option selected>...</option>
        <?php
        foreach (DataText::PERSONAL_PROFIL_LOCATION as $cityOfUser) {
        ?>
          <option value="<?= $cityOfUser ?>"><?= htmlspecialchars($cityOfUser) ?></option>
        <?php
        }
        ?>
      </select>
      <label for="avatar">Change avatar</label>
      <input type="file" id="avatar" name="profil_avatar" accept="image/png, image/jpeg, image/webp" required>
      <input type="submit" name="profil_update" value="<?= DataText::PERSONAL_PROFIL_SUBMIT ?>">
    </form>
    </fieldset>
  </div>
</section>