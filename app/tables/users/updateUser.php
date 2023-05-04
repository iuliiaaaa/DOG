<?php

use App\models\Client;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

var_dump($_POST);
        $user = Client::update($_POST);
        header("Location: /app/users/profile.php");
