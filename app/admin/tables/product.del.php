<?php

use App\models\Service;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$stream = file_get_contents("php://input");
if ($stream != null) {
    $id = json_decode($stream)->id;

    $delImage = Service::find($id)->image;
    var_dump($delImage);
    unlink("M:/OSPanel/domains/php-demo-flowers-fetch-checkbox/upload/" . $delImage);
    $del = Service::delService($id);
    echo json_encode(var_dump($delImage), JSON_UNESCAPED_UNICODE);
}
// $product = Product::delProduct($_POST["id"]);

// include $_SERVER["DOCUMENT_ROOT"] . "/app/admin/tables/product.php";
