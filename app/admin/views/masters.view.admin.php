<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<div class="container">
    <table>
        <form class="" action="/app/admin/tables/masters/masters.php" method="POST" enctype="multipart/form-data">
            <tr>
                <th>имя мастера:</th>
                <th>фамилия:</th>
                <th>отчество:</th>
                <th>характеристика:</th>
                <th>фотография:</th>
                <th>действия</th>
            </tr>
            <tr>
                <th><input type="text" class="form-control labelReg" name="name" value="<?= $_SESSION["data"]["name"] ?? "" ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="surname" value="<?= $_SESSION["data"]["surname"] ?? "" ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="patronymic" value="<?= $_SESSION["data"]["patronymic"] ?? "" ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="description" value="<?= $_SESSION["data"]["description"] ?? "" ?>">
                </th>
                <th><input type="file" class="form-control labelReg" name="image" value="<?= $_SESSION["data"]["image"] ?? "" ?>">
                </th>
                <th><button name="btn-add-master" class="addWorker button btn">добавить</button></th>
            </tr>
    </table>
    </form>
    <hr>
    <table>
        <tr class="legend">
            <th>id</th>
            <th>фотография</th>
            <th>имя мастера</th>
            <th>фамилия</th>
            <th>отчество</th>
            <th>характеристика</th>
            <th colspan="2">действия</th>
        </tr>
        <tbody class="masters-container">

        </tbody>
    </table>

    <script src="/assets/js/fetch.js"></script>
    <script src="/assets/js/loadMasters.js"></script>