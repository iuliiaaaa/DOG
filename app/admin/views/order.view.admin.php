<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<form action="/app/admin/tables/orders.php">
    <div class="form-check filter">
        <input class="form-check-input" type="radio" name="category" id="all" checked onchange="this.form.submit()" value="all">
        <label class="form-check-label" for="all">
            все заказы
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

</form>
<div class="tableOrder">
    <table>
        <tr>
            <th>id</th>
            <th>клиент</th>
            <th>статус</th>
            <th>причина отмены</th>
            <th>кол-во товаров</th>
            <th>стоимость</th>
            <th>дата создания</th>
            <th>дата обновления</th>
            <th colspan="2">действия</th>
        </tr>
        <?php foreach ($orders as $order) : ?>
            <tr class="orders-position">
                <th><?= $order->id ?></th>
                <th><?= $order->user ?></th>
                <th><?= $order->status ?></th>
                <th><?= $order->reason_cancel ?></th>
                <th><?= $order->count ?> шт.</th>
                <th><?= $order->price ?>₽</th>
                <th><?= $order->created_at ?></th>
                <th><?= $order->updated_at ?></th>
                <th class="doing"><a href="/app/admin/tables/order.status.php?id=<?= $order->id ?>" class="edit btn" name="edit">изменить</a></th>
                <th><a href="/app/admin/tables/order_product.php?id=<?= $order->id ?>" class="view btn" name="view">просмотреть</a></th>
            </tr>
        <?php endforeach; ?>
    </table>
</div>


<script src="/assets/js/loadOrder.js"></script>
