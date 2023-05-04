<?php

use App\models\Client;
use App\models\Pet;

include $_SERVER["DOCUMENT_ROOT"] . "/bootstrap.php";

if (isset($_POST["btn"])) {
    //имя
    if (!preg_match('/^[А-ЯЁ][а-яё]+$/u', $_POST['name'])) {
        $_SESSION['error']['name'] = 'имя введено некорректно';
        if ($_POST["name"] == null) {
            $_SESSION["error"]["name"] = "заполните поле";
            header("Location: /app/tables/users/create.php");
        }
    }

    //логин
    if (!preg_match('/^[+]7|8[0-9()-]{10}$\\s/', $_POST['phone'])) {
        $_SESSION['error']['phone'] = 'имя введено некорректно';
        if ($_POST["phone"] == null) {
            $_SESSION["error"]["phone"] = "заполните поле";
            header("Location: /app/tables/users/create.php");
        }
    }

    //пароль
    if ($_POST["password"] == $_POST["password_confirmation"]) {
        if (!Client::getUser($_POST["phone"], $_POST["password"])) {
            $user_id = Client::insert($_POST);
            $_SESSION["auth"] = true;
            $_SESSION["id"] = $user_id;
            $_SESSION["name"] = $_POST["name"];
            Pet::insert($_POST, $user_id);
            header("Location: /");
            die();
        } else {
            $_SESSION["data"]["name"] = $_POST["name"];
            $_SESSION["data"]["login"] = $_POST["login"];
            $_SESSION["auth"] = false;
            $_SESSION["error"]["reg"] = "вы уже зарегистрированы";
            header("Location: /app/tables/users/create.php");
            die();
        }
    } else {
        $_SESSION["data"]["name"] = $_POST["name"];
        $_SESSION["data"]["login"] = $_POST["login"];
        $_SESSION["auth"] = false;
        $_SESSION["error"]["reg"] = "разные пароли";
        header("Location: /app/tables/users/create.php");
        die();
    }
}
