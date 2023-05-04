<!-- <?php
include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>


<div class="profile">
<form action="/app/tables/users/updateUser.php" method="POST">
    <input type="hidden" name="id" value="<?=$_SESSION['id']?>">
    <h2>профиль</h2>
    <p>имя:</p>
    <input type="text"  name="name" value="<?= $user->name ?>">
    <p>телефон: </p>
    <input type="text" name="phone" id="" value="<?= $user->phone ?>">

    <h2>данные питомца:</h2>
    <?php foreach ($pets as $item):?>
    <p>кличка:</p>
    <input type="text" name="pet_name" id="" value="<?= $item->pet ?>">
    <p>порода:</p>
    <input type="text" name="breed" id="" value="<?= $item->breed ?>">
    <?php endforeach ?>
    <p>
        <button class="btn btn-primary">изменить профиль</button>
    </p>
    </form>
</div>

<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?> -->