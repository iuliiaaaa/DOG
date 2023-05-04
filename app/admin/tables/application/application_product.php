<?php
use App\models\Application;

include $_SERVER["DOCUMENT_ROOT"]."/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$serviseInApplication = Application::allServicesInByApplication(($_GET["application_id"]));

include $_SERVER["DOCUMENT_ROOT"]."/app/admin/views/services_in_application.view.php";
