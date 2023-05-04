<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php'; ?>
<h2 class="auth"><a class="authA" href="/views/users/auth.view.php">Вход</a> / <a class="authAEnter" href="/views/users/create.view.php">Регистрация</a></h2>
<br>

<div class="form-all">
    <form class="form-auth" action="/app/tables/users/insert.php" method="POST">
        <div class="input-auth">
            <label for="name">Имя:</label>
            <input type="text" name="name" id="name" value="<?= $_SESSION["data"]["name"] ?? "" ?>">
            <?php if (!empty($_SESSION["error"]["name"])) : ?>
                <p class="error"><?= $_SESSION["error"]["name"] ?></p>
            <?php endif ?><br>
            <!-- <hr> -->

            <label for="name">Телефон:</label>
            <input type="tel" name="phone" id="phone" value="<?= $_SESSION["data"]["phone"] ?? "" ?>">
            <?php if (!empty($_SESSION["error"]["phone"])) : ?>
                <p class="error"><?= $_SESSION["error"]["phone"] ?></p>
            <?php endif ?>
            <br>

            <label for="password">Пароль:</label>
            <input type="password" name="password" id="password"> <br>
            <label for="password_confirmation">Подтвердите пароль: <br>

            </label><input type="password" name="password_confirmation" id="password_confirmation">
            <br>

            <div class="create_pet">
                <label for="pet_name">Кличка собаки:</label> <br>
                <input type="text" name="pet_name" id="pet_name" value="<?= $_SESSION["data"]["pet_name"] ?? "" ?>">
                <?php if (!empty($_SESSION["error"]["pet_name"])) : ?>
                    <p class="error"><?= $_SESSION["error"]["pet_name"] ?></p>
                <?php endif ?>
                <br>
                <label for="breed">Порода:</label> <br> <br>
                <select name="breed" id="breed-select">
                    <?php foreach ($breeds as $breed) : ?>
                        <option value="<?= $breed->id ?>"><?= $breed->name ?></option>
                    <?php endforeach ?>
                </select>
                <br>
                <?php if (!empty($_SESSION["error"]["breed"])) : ?>
                    <p class="error"><?= $_SESSION["error"]["breed"] ?></p>
                <?php endif ?><br><label style="margin-left: 20px;" for="agreement">
                    <input type="checkbox" checked name="agreement" id="agreement">
                    Согласен на обработку персональных данных</label> <br>

                <?php if (!empty($_SESSION["error"]["reg"])) : ?>
                    <p class="error"><?= $_SESSION["error"]["reg"] ?></p>
                <?php endif ?> <br>
            </div>
            <div class="btnDiv">
                <button name="btn" class="authBtn" type="submit">зарегистрироваться</button>
            </div>
        </div>
    </form>
</div>


<script>
    document.querySelector('#agreement').addEventListener('change', (e) => {
        document.querySelector('[name=btn]').disabled = !e.target.checked
    })
</script>
<script src="/assets/js/jquery.js"></script>
<script src="/assets/js/jquery.maskedinput.js"></script>
<script src="/assets/js/mask.js"></script>
<?php
unset($_SESSION["error"]);
unset($_SESSION["data"]);
include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php';
?>