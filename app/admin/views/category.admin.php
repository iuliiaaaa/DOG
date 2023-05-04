<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<div class="admin-container">
    <form class="add-category" action="/app/admin/tables/category_add_admin.php" method="POST">
        <label for="name">
            введите название:
            <input type="text" class="form-control" name="name">
        </label>
            <button class="button" name="addBtn">добавить категорию</button>
    </form>
    <hr>
    <table>
        <tr>
            <th>id</th>
            <th>категории</th>
            <th colspan="2">действия</th>
        </tr>
        <?php foreach ($categories as $category) : ?>
            <tr class="category-position">
                <th><?= $category->id ?> </th>
                <th><?= $category->name ?> </th>
                <th><a class="btn-remove btn" data-id="<?= $category->id ?>"> удалить</a></th>
                <th><a href="/app/admin/tables/breeds/breeds_in_category.php?id=<?= $category->id ?>" class="btn">просмотреть</a></th>
            </tr>
        <?php endforeach ?>
    </table>
</div>
</div>

<script src="/assets/js/loadCategory.js"></script>
