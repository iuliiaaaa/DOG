<?php

use App\models\Breed;
use App\models\Pet;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$breeds = Breed::all();

include $_SERVER["DOCUMENT_ROOT"] . "/views/users/create.view.php";
