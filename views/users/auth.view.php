<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>

<div class="padding">
  <h2 class="auth"><a class="auth-a-enter" href="/views/users/auth.view.php">Вход</a> / <a class="authA" href="/app/tables/users/create.php">Регистрация</a></h2>

  <form class="form-auth" action="/app/tables/users/auth_check.php" method="POST">

    <div class="input-auth">
      <label for="phone">Телефон:</label>
      <input type="tel" name="phone" pattern="(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?" id="phone"><br>

      <label for="password">Пароль:</label>
      <input type="password" name="password" id="password"> <br>

      <?php if (!empty($_SESSION['error'])) : ?>
        <p class="error"><?= $_SESSION['error'] ?></p>
      <?php endif ?>

      <div class="btnDiv">
        <button class="authBtn" name="authBtn">войти</button>
      </div>
    </div>
  </form>
</div>

<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.maskedinput.js"></script>
<script src="/assets/js/mask.js"></script>
<?php unset($_SESSION['error']);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>