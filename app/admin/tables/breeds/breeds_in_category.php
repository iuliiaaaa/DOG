<?php

use App\models\Breed;

require_once $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$breedByCategory = Breed::viewBreedInCategory($_GET["id"]);

require_once $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/breeds_in_category.view.php";