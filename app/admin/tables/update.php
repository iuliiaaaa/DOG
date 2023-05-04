<?php

use App\models\Service;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$product = Service::find($_GET["id"]);
$categories = Service::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/product.update.view.php';
