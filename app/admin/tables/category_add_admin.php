<?php

use App\models\Category;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

if (isset($_POST["addBtn"])) {
    Category::addCategory($_POST['name']);
    unset($_SESSION);
}
$categories = Category::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/category.admin.php';
