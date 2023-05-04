<?php include $_SERVER['DOCUMENT_ROOT'] . '/views/templates/header.admin.php' ?>

<form action="/app/admin/tables/application/application.update.php" method="POST">
<input type="hidden" name="id" value="<?= $_GET['application_id']?>">
    <label for="status">статус заказа:</label>
    <select name="status" class="form-control" id="">
        <?php foreach ($statuses as $status) : ?>
            <option value="<?= $status->id ?>"> <?= $status->name ?></option>
        <?php endforeach ?>
    </select> <br>
    <label for="reason_cancel">причина отмены:</label> <br>
    <textarea class="" name="reason_cancel" id="reason_cancel" cols="30" rows="5"></textarea> <br>
    <button class="button" name="saveBtn">cохранить</button>
</form>

<script src="/assets/js/loadApplication.js"></script>