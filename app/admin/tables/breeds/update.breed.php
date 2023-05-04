<?php

use App\models\Breed;


include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$extensions = ["jpeg", "jpg", "png", "webp", "jfif"];
$types = ["image/jpeg", "image/jpg", "image/png", "image/jfif"];


$oldImg = Breed::find($_POST['id'])->image;

if (isset($_POST['btn-update-breed'])) {
    $delImage = $master->image;
    unlink('M:/OSPanel/domains/DOG/upload/' . $delImage);

    // $_POST['image'] = $product->image;
    if (isset($_FILES["image"]) && !empty($_FILES["image"]['name'])) {
        $name = $_FILES['image']['name'];
        $tmpName = $_FILES['image']['tmp_name'];
        $error = $_FILES['image']['error'];
        $size = $_FILES['image']['size'];
        $newName = time() . "_" . $name;
        $path_parts = pathinfo($name);

        if (in_array($path_parts["extension"], $extensions) && in_array(mime_content_type($tmpName), $types)) {
            if ($error == 0) {
                if (!($size < 2097152)) {
                    $_SESSION['error'] = "не удалось переместить файл, слишком большой";
                } else {
                    if (!move_uploaded_file($tmpName, $_SERVER['DOCUMENT_ROOT'] . "/upload/" . $newName)) {
                        $_SESSION['error'] = "не удалось переместить файл";
                    } else {
                        unlink("M:/OSPanel/domains/DOG/upload/" . $oldImg);
                    }
                    if (!$error) {
                        $_SESSION['size'] = $size / 8 / 1024 / 1024;
                    }
                }
            } else {
                $_SESSION['error'] = "есть ошибка";
            }
        } else {
            $_SESSION['error'] = "ошибка" . implode(",", $extensions);
        }

        if (empty($_SESSION['error'])) {
            $_SESSION['good'] = "все хорошо";
            $_POST['image'] = $newName;
        }
    }

    if (isset($_POST["btn-update-breed"])) {
        if ($_POST["id"] != null) {
            if (empty($_FILES["image"]["name"])) {
                Breed::update($_POST, $oldImg);
                header("Location: /app/admin/tables/breeds/insert.breed.php");
            } else {
                Breed::update($_POST, $newName);
                header("Location: /app/admin/tables/breeds/insert.breed.php");
            }
        }
    }
    // Worker::update($_POST, $newName);
    unset($_SESSION);
}
// header("Location: /app/admin/tables/masters/masters.php");
