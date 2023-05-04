<?php

namespace App\models;

use App\base\Connection;
use PDOException;
use App\models\Pet;

//все методы необходимые для работы с пользователем
class Client
{

    //достаём инф-ию о пользователе
    public static function all()
    {
        $query = Connection::make()->query("SELECT name, phone FROM clients");
        return $query->fetchAll();
    }

    //добавление пользователя
    public static function insert($data, $conn = null)
    {
        $conn = $conn ?? Connection::make();
        $query = $conn->prepare("INSERT INTO clients (name, phone, password) VALUES (:name, :phone, :password)");

        $query->execute([
            "name" => $data["name"],
            "phone" => $data["phone"],
            "password" => password_hash($data['password'], PASSWORD_DEFAULT)
        ]);
        return $conn->lastInsertId();
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM clients WHERE id = :id");
        return $query->execute([":id" => $id]);
    }

    //авторизация
    public static function getUser($phone, $password)
    {
        $query = Connection::make()->prepare("SELECT * FROM clients WHERE clients.phone = :phone");
        $query->execute([":phone" => $phone]);

        $user = $query->fetch();
        if ($user && password_verify($password, $user->password)) {
            return $user;
        }
        return false;
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT clients.name, clients.phone, pets.name as pet, breeds.name as breed FROM clients INNER JOIN pets ON clients.id = pets.client_id INNER JOIN breeds ON breeds.id = pets.breed_id WHERE clients.id = :id");
        $query->execute([":id" => $id]);
        $user = $query->fetch();
        return $user;
    }

    //изменение данных пользователя
    public static function update($data)
    {
        $query = Connection::make()->prepare("UPDATE clients SET users.name = :name, phone = :phone");
        $query->execute([
            "name" => $data["name"],
            "phone" => $data["phone"],
        ]);
        $user = $query->fetch();
        return $user;
    }
}
