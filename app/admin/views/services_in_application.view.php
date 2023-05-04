<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>
<div>
    <?php foreach ($serviseInApplication as $service) :
    ?>

    <?php endforeach ?>
    <table>
        <tr>
            <th colspan="2">номер заказа: <b><?= $service->application_id ?></b></th>
        </tr>
        <tr>
            <th colspan="2">клиент: <b><?= $service->client ?></b></th>
        </tr>
        <tr>
            <th colspan="2">дата заявки: <?= $service->registration_date ?></th>
        </tr>
        <tr class="change-datetime">
            <th>дата посещения: <?= $service->date_provision ?></th>
            <th>время посещения: <?= $service->time_provision ?></th>
        </tr>
        <tr>
            <th><input type="date" value="<?= $service->date_provision ?>"></th>
            <th><input type="time" value="<?= $service->time_provision ?>"></th>
        </tr>
        <th colspan="2"><a class="btn btn-change" href="">изменить дату и время посещения</a></th>
        </tr>
        <tr>
            <th colspan="2">статус заказа: <?= $service->status ?></th>
        </tr>
        <tr>
            <th colspan="2"></th>
        </tr>
        <tr>
            <th>название</th>
            <th>цена</th>
        </tr>
        <tbody>
            <?php foreach ($serviseInApplication as $service) : ?>
                <tr>
                    <th><?= $service->service ?></th>
                    <th><?= (int)$service->price ?>₽</th>
                </tr>
            <?php endforeach ?>
            <tr>
                <th>всего: <?= $service->count ?> шт.</th>
                <th>итоговая стоимость: <?= $service->allprice ?>₽</th>
            </tr>
        </tbody>
    </table>
</div>

<script>
    document.querySelector('.btn-change').addEventListener('click', )
</script>