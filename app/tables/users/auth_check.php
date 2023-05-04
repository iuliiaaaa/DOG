<?php
session_start();

use App\models\Client;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";
unset($_SESSION['error']);

if (isset($_POST['authBtn'])) {
    $user = Client::getUser($_POST['phone'], $_POST['password']);

    if ($user == null) {
        $_SESSION['auth'] = false;
        $_SESSION['error'] = 'пользователь не найден';
        header("Location: /app/tables/users/auth.php");
        die();
    } else {
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user->id;
        $_SESSION['name'] = $user->name;
        $_SESSION['role'] = $user->role;
        header("Location: /app/tables/users/profile.php");
    }
}
