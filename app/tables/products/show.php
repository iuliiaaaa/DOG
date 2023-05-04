<?php

use App\models\Product;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$product = Product::find($_GET['id']);

include $_SERVER['DOCUMENT_ROOT'] . '/views/products/show.view.php';