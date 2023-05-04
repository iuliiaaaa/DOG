<?php

use App\models\Breed;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

//получаем поток для работы с данными
$stream = file_get_contents("php://input");

if ($stream != null) {
    //декодируем полученные данные
    $breed_id = json_decode($stream)->data;
    $action = json_decode($stream)->action;

    $Breed = match ($action) {
        "delete" => Breed::deleteBreed($breed_id),
    };
    echo json_encode([
        "Breed" => $Breed,
    ], JSON_UNESCAPED_UNICODE);
}