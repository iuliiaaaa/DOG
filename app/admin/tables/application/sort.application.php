<?php

use App\models\Application;
use App\models\Status;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$applications = Application::allInfo();
$statuses = Status::all();
if (isset($_GET["category"])) {
    if ($_GET["category"] != "all") {
        $applications = Application::ordersByStatuses($_GET["category"]);
    }
}

json_encode($applications, JSON_UNESCAPED_UNICODE);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/views/applications.view.admin.php";
