<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.php' ?>

<div class="padding">
    <div class="workers_container">
        <h1 class="masters-h">Наши мастера</h1>
        <?php foreach ($masters as $master) : ?>
            <div class="workers">
                <div class="gray-block-workers">
                    <div class="workers-photo">
                        <img src="/upload/<?= $master->image ?>" class="masters-image" alt="<?= $master->name ?>">
                    </div>
                    <div class="workers-info">
                        <p class="name-worker"><?= $master->surname ?> <?= $master->name ?> <?= $master->patronymic ?></p>
                        <p class="description-worker"><?= $master->description ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>

    <div class="workers_container-mobile">
        <h1 class="masters-h">Наши мастера</h1>
        <?php foreach ($masters as $master) : ?>
            <div class="workers">
                <div class="gray-block-workers">
                    <div class="workers-photo">
                        <img src="/upload/<?= $master->image ?>" class="masters-image" alt="<?= $master->name ?>">
                    </div>
                    <p class="name-worker"><?= $master->surname ?> <?= $master->name ?> <?= $master->patronymic ?></p>
                    <p class="description-worker"><?= $master->description ?></p>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/footer.php' ?>