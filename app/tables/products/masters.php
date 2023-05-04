<?php

use App\models\Worker;

include $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

$masters = Worker::all();

include $_SERVER['DOCUMENT_ROOT'] . '/views/products/masters.view.php';
