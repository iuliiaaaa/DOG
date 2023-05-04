<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>
<div>
    <table>
    <tr>
        <th>изображение</th>
        <th>название породы</th>
        <th>категория</th>
    </tr>
    <tbody>
        <?php foreach ($breedByCategory as $breed) : ?>
            <tr>
                <th><img class="image-table" src="/upload/<?= $breed->image ?>"></th>
                <th><?= $breed->name ?></th>
                <th><?= $breed->category ?></th>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
</div>

