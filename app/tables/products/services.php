<?php

use App\models\Breed;
use App\models\Category;
use App\models\Service;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$categories = Category::all();

$services = Service::all();

$breeds = Breed::viewBreedInCategory($_GET['category']);

include $_SERVER['DOCUMENT_ROOT'] . '/views/products/services.view.php';
