<?php

namespace App\models;

use App\base\Connection;

class Pet
{
    //достаём инф-ию о пользователе
    public static function all()
    {
        $query = Connection::make()->query("SELECT name, client_id, breed_id, breeds.name, clients.name FROM pets INNER JOIN breeds ON breeds.id = breed_id INNER JOIN clients ON client_id = clients.id");
        return $query->fetchAll();
    }

    //добавление питомца
    public static function insert($data, $user_id)
    {
        $query = Connection::make()->prepare("INSERT INTO pets(name, client_id, breed_id) VALUES (:name, :client_id, :breed_id)");
        $query->execute([
            "name" => $data["pet_name"],
            "client_id" => $user_id,
            "breed_id" => $data["breed"]
        ]);
        return $query->fetchAll();
    }

    public static function delete($id)
    {
        $query = Connection::make()->prepare("DELETE FROM pets WHERE id = :id");
        return $query->execute([":id" => $id]);
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT pets.id, pets.name as pet, pets.breed_id, breeds.name as breed FROM pets INNER JOIN clients ON clients.id = pets.client_id INNER JOIN breeds ON breeds.id = pets.breed_id WHERE clients.id = :id");
        $query->execute([":id" => $id]);
        $user = $query->fetchAll();
        return $user;
    }

    //изменение данных
    public static function update($data)
    {
        $query = Connection::make()->prepare("UPDATE pets SET pets.name = :pet_name, phone = :phone");
        $query->execute([
            "pet_name" => $data["pet_name"],
            "phone" => $data["phone"],
        ]);
        $user = $query->fetch();
        return $user;
    }

}