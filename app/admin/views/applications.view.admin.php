<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<form action="/app/admin/tables/application/sort.application.php">
    <div class="form-check filter">
        <input class="form-check-input" type="radio" name="category" id="all" checked onchange="this.form.submit()" value="all">
        <label class="form-check-label" for="all">
            Все заявки
        </label>
    </div>

    <div class="filterAll">
        <?php foreach ($statuses as $status) : ?>
            <div class="form-check ">
                <input class="form-check-input" type="radio" name="category" id="<?= $status->id ?>" value="<?= $status->id ?> " onchange="this.form.submit()" <?= isset($_GET["category"]) && $_GET["category"] == $status->id ? "checked" : "" ?>>
                <label class="form-check-label" for="<?= $status->id ?>">
                    <?= $status->name ?>
                </label>
            </div>
        <?php endforeach ?>
    </div>
<hr>
</form>
<div class="tableOrder">
    <table>
        <tr>
            <th>id</th>
            <th>клиент</th>
            <th>статус</th>
            <th>питомец</th>
            <th>порода</th>
            <th>количество услуг</th>
            <th>стоимость</th>
            <th>дата регистрации</th>
            <th colspan="2">действия</th>
        </tr>
        <?php foreach ($applications as $application) : ?>
            <tr class="orders-position">
                <th><?= $application->id ?></th>
                <th><?= $application->client ?></th>
                <th><?= $application->status ?></th>
                <th><?= $application->pet ?></th>
                <th><?= $application->breed ?></th>
                <th><?= $application->count ?> шт.</th>
                <th><?= (int)$application->price ?> ₽</th>
                <th><?= $application->registration_date ?></th>
                <th class="doing"><a href="/app/admin/tables/application/application.status.php?application_id=<?= $application->id ?>" class="edit btn" name="edit">изменить</a></th>
                <th><a href="/app/admin/tables/application/application_product.php?application_id=<?= $application->id ?>" class="view btn" name="view">просмотреть</a></th>
            </tr>
        <?php endforeach ?>
    </table>
</div>
<script src="/assets/js/loadApplication.js"></script>