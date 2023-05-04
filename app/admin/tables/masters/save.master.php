<?php

use App\models\Worker;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

//получаем поток для работы с данными
$stream = file_get_contents("php://input");

if ($stream != null) {
    //декодируем полученные данные
    $master_id = json_decode($stream)->data;
    $action = json_decode($stream)->action;

    $Master = match ($action) {
        "delete" => Worker::delWorker($master_id),
    };
    echo json_encode([
        "Master" => $Master,
    ], JSON_UNESCAPED_UNICODE);
}