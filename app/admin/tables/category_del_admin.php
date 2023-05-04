<?php

use App\models\Category;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$stream = file_get_contents("php://input");
if ($stream != null) {
    $id = json_decode($stream)->id;
    $del = Category::deleteCategory($id);
    echo json_encode($del, JSON_UNESCAPED_UNICODE);
}

$categories = Category::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/category.admin.php';
