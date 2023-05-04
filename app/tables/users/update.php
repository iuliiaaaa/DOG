<?php

use App\models\Category;
use App\models\Client;
use App\models\Pet;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user = Client::find($_SESSION['id']);
$pets = Pet::find($_SESSION['id']);
$categories = Category::all();

include $_SERVER['DOCUMENT_ROOT'] . '/views/users/update.view.php';