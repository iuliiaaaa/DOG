<?php

use App\models\Breed;
use App\models\Client;
use App\models\Pet;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user = Client::find($_SESSION['id']);
$breeds = Breed::all();
$pets = Pet::find($_SESSION['id']);

include $_SERVER["DOCUMENT_ROOT"] . "/views/users/profile.view.php";