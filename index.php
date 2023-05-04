<?php

use App\models\Category;
use App\models\Worker;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$categories = Category::all();
$workers = Worker::lastFourWorkers();

include $_SERVER['DOCUMENT_ROOT'] . '/views/products/index.view.php';
