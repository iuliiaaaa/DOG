<?php

use App\models\Breed;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

//декодируем json данные (категории)
// $breed = Breed::all();

// echo json_encode($breed, JSON_UNESCAPED_UNICODE);
if (isset($_GET['category'])) {
    $categories = json_decode($_GET['category']);

    //если выбрано всё, то запускаем метод "получить всё"
    if (!isset($categories) || empty($categories) || $categories == "all") {
        $breed = Breed::all();
    } else {
        $breed = Breed::breedsByManyCategories($categories);
    }
    echo json_encode($breed, JSON_UNESCAPED_UNICODE);
}