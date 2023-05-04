<?php

use App\models\Pet;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

$user_id = $_SESSION["id"];

if (isset($_POST["add-pet"])) {
    Pet::insert($_POST, $user_id);
}

header("Location: /app/tables/users/profile.php");
