<?php

use App\models\Worker;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/png", "image/webp", "image/jfif"];
$newName = "";

if (isset($_FILES["image"])) {
    $name = $_FILES["image"]["name"];
    $tmpName = $_FILES["image"]["tmp_name"];
    $error = $_FILES["image"]["error"];
    $size = $_FILES["image"]["size"];

    $path_parts = pathinfo($name);
    $ext = $path_parts["extension"];
    $mim = mime_content_type($tmpName);

    if (in_array($ext, $extensions) && in_array($mim, $types)) {

        $newName = $name;
        if ($error == 0) {
            if ($size > 3145728) {
                $_SESSION["error"] = "файл слишком большой";
            } else {
                if (!move_uploaded_file($tmpName, "M:/OSPanel/domains/DOG/upload/" .$newName)) {
                    $_SESSION["error"] = "не удалось переместить файл";
                };
            }
        } else {
            $_SESSION["error"] = "есть ошибка";
        };
    } else {
        $_SESSION["error"] = "расширение файла должно быть: " . implode(", ", $extensions);
    };
};
if (isset($_POST["btn-add-master"])) {
    Worker::addWorker($_POST, $newName);
}

header("Location: /app/admin/views/masters.view.admin.php");