<?php

use App\models\Application;
use App\models\Breed;
use App\models\Client;
use App\models\Pet;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

// if (!isset($_SESSION['auth']) || !$_SESSION['auth']) {
//     header("Location: /app/tables/users/create.php");
//     die();
// }
$user = Client::find($_SESSION['id']);
$pets = Pet::find($_SESSION['id']);
$application = Application::findProfile($_SESSION['id']);
$breeds = Breed::all();


include $_SERVER["DOCUMENT_ROOT"] . "/views/users/profile.view.php";
