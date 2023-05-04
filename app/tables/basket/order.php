<?php

use App\models\Order;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user_id = $_SESSION['id'];
// $user_id = 2;
Order::create($user_id);

// header('Location: /');