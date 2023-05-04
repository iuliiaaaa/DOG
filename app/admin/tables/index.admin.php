<?php

// use App\models\Category;
// use App\models\Country;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

// $categories = Category::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/index.view.admin.php';
