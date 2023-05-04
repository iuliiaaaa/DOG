<?php

include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/header.php" ?>
<div class="padding">
    <div class="profile">
        <h2 class="profile-h">Профиль</h2>
        <div class="user-pet-profile">
            <div class="user-profile">

                <div class="user-info">
                    <div class="gray-block">
                        <p class="user-name">Имя: <?= $user->name ?></p>
                        <p class="user-phone">Телефон: <?= $user->phone ?></p>
                    </div>
                </div>

                <div class="btn-user">
                    <div class="gray-block-2">
                        <a class="btn-user-click" href="/app/tables/products/application.php">записать питомца</a>
                        <a class="btn-user-click" href="/app/tables/users/logauth.php">выйти</a>
                    </div>
                </div>
            </div>

            <h2 class="profile-h">Мои питомцы:</h2>
            <div class="profile-dog">
                <div class="info-dog">
                    <?php foreach ($pets as $item) : ?>
                        <div class="name">
                            <hr>
                            <h5 class="name-h">Кличка: <?= $item->pet ?></h5>
                            <hr>
                        </div>

                        <div class="breed">
                            <hr>
                            <h5 class="breed-h">Порода: <?= $item->breed ?></h5>
                            <hr>
                        </div>
                    <?php endforeach ?>
                </div>
                <div class="profile-image">
                </div>
            </div>
        </div>
        <div class="add-dog-form">
            <p>
                <a class="btn btn-user-click-add" data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">добавить питомца</a>
            </p>
            <form action="/app/tables/products/pet.add.php" method="POST">
                <div class="row">
                    <div class="col">
                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                            <div class="card-add-dog">
                                <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                <label class="label-profile" for="pet_name">введите кличку:</label> <br>
                                <input type="text" name="pet_name" value="<?= $_SESSION["data"]["pet_name"] ?? "" ?>"> <br>

                                <label class="label-profile" for="breed">выберите породу:</label> <br>
                                <select name="breed" id="breed">
                                    <?php foreach ($breeds as $breed) : ?>
                                        <option value="<?= $breed->id ?>"><?= $breed->name ?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- <?php if (!empty($_SESSION['error'])) : ?>
                                    <p class="error"><?= $_SESSION['error']["pet_name"] ?></p>
                                <?php endif ?> -->
                                <div class="btn-add-finish">
                                    <button name="add-pet" class="add-pet">добавить</a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <!-- <h2 class="profile-h">Мои заявки:</h2><hr>
        <div class="application-profile">
            <div class="app-info-profile">
                <p>Статус</p>
                <p>Питомец</p>
                <p>Порода</p>
                <p>Мастер</p>
                <p>Кол-во услуг</p>
                <p>Стоимость</p>
                <p>Посещение</p>
            
                <?php foreach ($application as $app) : ?>
                    <p><?= $app->status ?></p>
                    <p><?= $app->pet ?></p>
                    <p><?= $app->breed ?></p>
                    <p><?= $app->worker ?></p>
                    <p><?= $app->count ?> шт.</p>
                    <p><?= (int)$app->price ?> ₽</p>
                    <p><?= $app->date_provision ?> <?= $app->time_provision ?></p>
        <?php endforeach ?>
        </div>
        <hr> -->
    </div>
</div>
<script src="/assets/js/editProfil.js"></script>
<?php include $_SERVER["DOCUMENT_ROOT"] . "/views/templates/footer.php" ?>