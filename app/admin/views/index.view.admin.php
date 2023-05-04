<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<!-- флажки для фильтрации -->
<div class="container">


    <table>
        <form class="" action="/app/admin/tables/insert.product.php" method="POST" enctype="multipart/form-data">
            <tr>
                <th>название услуги:</th>
                <th>цена услуги:</th>
                <th>описание:</th>
                <th>продолжительность:</th>
                <th>действия</th>
            </tr>
            <tr>
                <th><input type="text" class="form-control labelReg" name="name" value="<?= $_SESSION["data"]["name"] ?? "" ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="price" value="<?= $_SESSION["data"]["price"] ?? "" ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="description" value="<?= $_SESSION["data"]["description"] ?? "" ?>">
                </th>
                <th><input type="number" class="form-control labelReg" name="duration" value="<?= $_SESSION["data"]["duration"] ?? "" ?>">
                </th>

                <th><button name="btn-add" class="addProduct button btn-change btn">добавить товар</button></th>
            </tr>
    </table>
    </form>

    <hr>

    <table>
        <tr class="legend">
            <th>id</th>
            <th>название</th>
            <th>цена</th>
            <th>описание</th>
            <th>продолжительность</th>
            <th colspan="2">действия</th>
        </tr>
        <tbody class="product-container">

        </tbody>
    </table>

    <script src="/assets/js/fetch.js"></script>
    <script src="/assets/js/loadAdmin.js"></script>

