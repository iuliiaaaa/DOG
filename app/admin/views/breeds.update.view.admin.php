<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>
<div>
    <br> <br>
    <table>
        <form class="" action="/app/admin/tables/breeds/update.breed.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $breed->id ?>">
            <tr>
                <th>фотография:</th>
                <th>название породы:</th>
                <th>выбрать новую фотографию:</th>
                <th>категория:</th>
                <th>действия</th>
            </tr>
            <tr>
                <th><img src="/upload/<?= $breed->image ?>" class="masters-img" id="loadedImg" alt=""></th>
                <th><input type="text" class="form-control labelReg" name="name" value="<?= $breed->name ?>">
                </th>
                <th><input type="file" class="form-control labelReg" id="file" name="image" value="<?= $breed->image ?>">
                </th>
                <th>
                    <select name="category_id" id="">
                        <?php foreach ($categories as $category) : ?>
                            <option value="<?= $category->id ?>"><?= $category->name ?></option>
                        <?php endforeach ?>
                    </select>
                </th>
                
                <th><button name="btn-update-breed" class="update-breed btn button">изменить данные</button></th>
            </tr>
    </table>
    </form>
</div>
<script src="/assets/js/loadImage.js" defer></script>
<script src="/assets/js/loadBreeds.js" defer></script>