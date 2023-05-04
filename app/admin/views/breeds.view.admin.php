<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<!-- флажки для фильтрации -->
<div class="container">
    <div class='filterAll'>
        <?php foreach ($categories as $category) : ?>
            <div class="form-check ">
                <input class="form-check-input" type="checkbox" name="category" id="<?= $category->id ?>" value="<?= $category->id ?>">
                <label class="form-check-label" for="<?= $category->id ?>">
                    <?= $category->name ?>
                </label>
            </div>
        <?php endforeach ?>
        <p class="count-breeds"></p>
    </div>
    <hr>
    <div class="container">
        <table>
            <form class="" action="/app/admin/tables/breeds/insert.breed.php" method="POST" enctype="multipart/form-data">
                <tr>
                    <th>название породы:</th>
                    <th>фотография:</th>
                    <th>категория:</th>
                    <th>действия</th>
                </tr>
                <tr>
                    <th><input type="text" class="form-control labelReg" name="name" value="<?= $_SESSION["data"]["name"] ?? "" ?>">
                    </th>
                    <th><input type="file" class="form-control labelReg" name="image" value="<?= $_SESSION["data"]["image"] ?? "" ?>">
                    </th>
                    <th>
                        <select name="category_id" id="">
                            <?php foreach ($categories as $category) : ?>
                                <option value="<?= $category->id ?>"><?= $category->name ?></option>
                            <?php endforeach ?>
                        </select>
                    </th>

                    <th><button name="btn-add-master" class="addBreed button btn">добавить породу</button></th>
                </tr>
        </table>
        </form>

        <hr>

        <table>
            <tr class="legend">
                <th>id</th>
                <th>фотография</th>
                <th>название</th>
                <th>категория</th>
                <th colspan="2">действия</th>
            </tr>
            <tbody class="breeds-container">
                
            </tbody>
        </table>

        <script src="/assets/js/fetch.js"></script>
        <script src="/assets/js/loadBreeds.js"></script>