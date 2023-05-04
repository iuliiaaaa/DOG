<?php

use App\models\Application;
// use App\models\Product;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//получаем поток для работы с данными
$stream = file_get_contents("php://input");

if ($stream != null) {
    //декодируем полученные данные
    $data = json_decode($stream)->data;
    $action = json_decode($stream)->action;
    // $delImage = Product::find($product_id)->image;
    // var_dump($delImage);
    // unlink("M:/OSPanel/domains/php-demo-flowers-fetch-checkbox/upload/" . $delImage);

    $Product = match ($action) {
        "getLockTime" => Application::workersTime($data->worker_id,$data->date),
    };
    echo json_encode([
        "Product" => $Product,
    ], JSON_UNESCAPED_UNICODE);
}