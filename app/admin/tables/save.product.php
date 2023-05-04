<?php

use App\models\Service;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

//получаем поток для работы с данными
$stream = file_get_contents("php://input");

if ($stream != null) {
    //декодируем полученные данные
    $product_id = json_decode($stream)->data;
    $action = json_decode($stream)->action;

    $Product = match ($action) {
        "delete" => Service::delService($product_id),
    };
    echo json_encode([
        "Product" => $Product,
    ], JSON_UNESCAPED_UNICODE);
}