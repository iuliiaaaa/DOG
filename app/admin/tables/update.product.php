<?php

use App\models\Service;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$product = Service::find($_POST['id']);

if (isset($_POST['btn-update'])) {

    Service::update($_POST);
    unset($_SESSION);
}
header("Location: /app/admin/tables/index.admin.php");
