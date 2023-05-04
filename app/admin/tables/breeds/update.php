
<?php

use App\models\Breed;
use App\models\Category;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$breed = Breed::find($_GET["id"]);
$categories = Category::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/breeds.update.view.admin.php';
