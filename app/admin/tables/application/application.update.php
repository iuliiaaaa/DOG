<?php

use App\models\Application;

require_once $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

Application::update($_POST["status"], $_POST["id"]);

require_once $_SERVER["DOCUMENT_ROOT"] . "/app/admin/tables/application/application.php";
