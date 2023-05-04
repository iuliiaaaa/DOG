<?php

use App\models\Basket;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

//получаем поток для работы с входными данными
$stream = file_get_contents("php://input");

if ($stream != null) {
    //декодируем полученные данные
    $product_id = json_decode($stream)->data;
    $action = json_decode($stream)->action;
    $user_id = $_SESSION['id'];
    // $user_id = 2;

    $productInBasket = match ($action) {
        "add" => Basket::add($product_id, $user_id),
        "dec" => Basket::dec($product_id, $user_id),
        "delete" => Basket::deleteProduct($product_id, $user_id),
        "clear" => Basket::clear($user_id, $conn)
    };
    echo json_encode([
        "productInBasket" => $productInBasket,
        "totalPrice" => Basket::totalPrice($user_id),
        "totalCount" => Basket::totalCount($user_id)
    ], JSON_UNESCAPED_UNICODE);
}
