<?php
use App\models\Client;
use App\models\Pet;
use App\models\Service;
use App\models\Worker;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';
if(!isset($_SESSION['auth']) || !$_SESSION['auth']){
    header("Location: /app/tables/users/auth.php");
    die();
}

$user = Client::find($_SESSION['id']);
$services = Service::all();
$pets = Pet::find($_SESSION['id']);
$workers = Worker::all();

include $_SERVER['DOCUMENT_ROOT'] . '/views/products/application.view.php';