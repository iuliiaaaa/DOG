<?php

use App\models\Worker;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

//декодируем json данные (категории)
$masters = Worker::all();

echo json_encode($masters, JSON_UNESCAPED_UNICODE);

