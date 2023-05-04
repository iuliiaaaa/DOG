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
        header("Location: /app/admin/tables/auth.admin.php");
        die();
    } else if ($user->role == 'администратор') {
        $_SESSION['admin'] = true;
        $_SESSION['id'] = $user->id;
        header("Location: /app/admin/tables/index.admin.php");
    } else {
        $_SESSION['error'] = 'доступ запрещён';
        header("Location: /app/admin/tables/auth.admin.php");
    }
}
