<?php

use App\models\Service;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

if (isset($_POST["btn-add"])) {
    Service::addService($_POST);
}

header("Location: /app/admin/tables/index.admin.php");
