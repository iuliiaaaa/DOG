<?php

use App\models\Application;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

if (isset($_POST['record-btn'])) {
    $_POST["date_provision"] = date_create($_POST["date_provision"])->Format('Y-m-d');
    Application::create($_SESSION['id'], $_POST['pet_id'], $_POST['service_id'], $_POST['worker_id'], $_POST['date_provision'], $_POST['times'], $_POST['total_duration']);
}

header('Location: /app/tables/users/profile.php');
