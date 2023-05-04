<?php

use App\models\Breed;
use App\models\Service;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

//декодируем json данные (категории)

$products = Service::all();

echo json_encode($products, JSON_UNESCAPED_UNICODE);

// if (isset($_GET['category'])) {
//     $categories = json_decode($_GET['category']);

//     //если выбрано всё, то запускаем метод "получить всё"
//     if (!isset($categories) || empty($categories) || $categories == 'all') {
//         $breeds = Breed::all();
//     } else {
//         $breeds = Breed::viewBreedInCategory($categories);
//     }
//     echo json_encode($products, JSON_UNESCAPED_UNICODE);
// }
