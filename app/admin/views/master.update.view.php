<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>
<div>
    <br> <br>
    <table>
        <form class="" action="/app/admin/tables/masters/update.master.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $master->id ?>">
            <tr>
                <th>фотография:</th>
                <th>имя мастера:</th>
                <th>фамилия:</th>
                <th>отчество:</th>
                <th>характеристика:</th>
                <th>выбрать новую фотографию:</th>
                <th>действия</th>
            </tr>
            <tr>
                <th><img src="/upload/<?= $master->image ?>" class="masters-img" id="loadedImg" alt=""></th>
                <th><input type="text" class="form-control labelReg" name="name" value="<?= $master->name ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="surname" value="<?= $master->surname ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="patronymic" value="<?= $master->patronymic ?>">
                </th>
                <th><input type="text" class="form-control labelReg" name="description" value="<?= $master->description ?>">
                </th>
                <th><input type="file" class="form-control labelReg" id="file" name="image" value="<?= $master->image ?>">
                    <!-- <img src="/upload/<?= $master->image ?>" class="masters-img" alt=""> -->

                </th>


                <th><button name="btn-update-master" class="addWorker button btn">изменить данные</button></th>
            </tr>
    </table>
    </form>
</div>
<script src="/assets/js/loadImage.js" defer></script>
<script src="/assets/js/loadMasters.js" defer></script>