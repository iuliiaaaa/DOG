<?php

namespace App\models;

use App\base\Connection;

class Worker
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT workers.id, workers.name, surname, patronymic, description, image FROM workers");
        return $query->fetchAll();
    }

    public static function lastFourWorkers()
    {
        $query = Connection::make()->query("SELECT * FROM workers ORDER BY workers.id DESC LIMIT 4");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT workers.* FROM workers WHERE workers.id = :id");
        $query->execute([":id" => $id]);
        $master = $query->fetch();
        return $master;
    }

    //изменение данных
    public static function update($data, $img)
    {
        $query = Connection::make()->prepare("UPDATE workers SET workers.name = :name, surname = :surname, patronymic = :patronymic, description = :description, image = :image WHERE workers.id = :id");
        $query->execute([
            "name" => $data["name"],
            "surname" => $data["surname"],
            "patronymic" => $data["patronymic"],
            "description" => $data["description"],
            "image" => $img,
            "id" => $data["id"]
        ]);
        $master = $query->fetch();
        return $master;
    }

    public static function addWorker($data, $newName)
    {
        $query = Connection::make()->prepare("INSERT INTO workers (name, surname, patronymic, description, image) VALUES (:name, :surname, :patronymic, :description, :image)");
        $query->execute([
            ":name" => $data["name"],
            ":surname" => $data["surname"],
            ":patronymic" => $data["patronymic"],
            ":description" => $data["description"],
            ":image" => $newName
        ]);
    }

    public static function delWorker($master_id)
    {
        $query = Connection::make()->prepare("DELETE FROM workers WHERE id = :id");
        $query->execute([
            ":id" => $master_id
        ]);
    }
}
