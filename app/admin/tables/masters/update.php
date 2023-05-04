
<?php

use App\models\Worker;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (!isset($_SESSION['admin']) || !$_SESSION["admin"]) {
    header("Location: /app/admin/tables/auth.admin.php");
    die();
}

$master = Worker::find($_GET["id"]);
// $categories = Service::all();

include $_SERVER['DOCUMENT_ROOT'] . '/app/admin/views/master.update.view.php';
