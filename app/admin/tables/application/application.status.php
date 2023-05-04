<?php

use App\models\Status;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$statuses = Status::all();

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/application.view.update.admin.php";
