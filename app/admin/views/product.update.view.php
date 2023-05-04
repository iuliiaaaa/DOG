<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>
<div>
    <br> <br>
    <table>
        <form class="" action="/app/admin/tables/update.product.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $product->id ?>">
            <tr>
                <th>название услуги:</th>
                <th>цена услуги:</th>
                <th>описание:</th>
                <th>продолжительность:</th>
                <th>действия</th>
            </tr>
            <tr>
                <th><input type="text" class="form-control labelReg" name="name" value="<?= $product->name ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="price" value="<?= $product->price ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="description" value="<?= $product->description ?>">
                </th>
                <th><input type="number" class="form-control labelReg" name="duration" value="<?= $product->duration ?>">
                </th>

                <th><button name="btn-update" class="addProduct button btn">изменить товар</button></th>
            </tr>
    </table>
    </form>
</div>

<script src="/assets/js/loadAdmin.js" defer></script>
