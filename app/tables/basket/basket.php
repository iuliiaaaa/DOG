<?php

use App\models\Basket;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if(!isset($_SESSION['id']) || !$_SESSION['id']){
    
}
$user_id = $_SESSION['id'];
// $user_id = 2;

$productInBasket = Basket::all($user_id);
$totalPrice = Basket::totalPrice($user_id);
$totalCount = Basket::totalCount($user_id);

include $_SERVER["DOCUMENT_ROOT"] . "/views/products/basket.view.php";
