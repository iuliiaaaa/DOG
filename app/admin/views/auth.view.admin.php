<link rel="stylesheet" href="/assets/css/style.admin.css">
<h2 class="admin-auth">Авторизация</h2>

<form class="form-auth" action="/app/admin/tables/auth_check.admin.php" method="POST">
    <div class="input-auth">
        <label for="phone">Телефон:</label><br>
        <input type="tel" name="phone" pattern="(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?" id="phone"><br>

        <label for="password">Пароль:</label><br>
        <input type="password" name="password" id="password"> <br>

        <?php if (!empty($_SESSION['error'])) : ?>
            <p class="error"><?= $_SESSION['error'] ?></p>
        <?php endif ?>
        <br>
        <div class="btnDiv ">
            <button name="authBtn" class="authBtn">Войти</button>
        </div>
    </div>
</form>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.maskedinput.js"></script>
<script src="/assets/js/mask.js"></script>

<?php unset($_SESSION['error']);
