<?php

namespace App\models;

use App\base\Connection;

class Service
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT services.* FROM services");
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT services.* FROM services WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    public static function addService($data)
    {
        $query = Connection::make()->prepare("INSERT INTO services(name, price, description, duration) VALUES (:name, :price, :description, :duration)");
        $query->execute([
            ":name" => $data["name"],
            ":price" => $data["price"],
            ":description" => $data["description"],
            ":duration" => $data["duration"],
        ]);
    }
    public static function delService($service_id)
    {
        $query = Connection::make()->prepare("DELETE FROM services WHERE id = :id");
        $query->execute([
            ":id" => $service_id
        ]);
    }

    public static function update($data)
    {
        $query = Connection::make()->prepare("UPDATE services SET name = :name , price = :price, description = :description, duration = :duration  WHERE id = :id");
        $query->execute([
            "name" => $data["name"],
            "price" => $data["price"],
            "description" => $data["description"],
            "duration" => $data["duration"],
            "id" => $data["id"]
        ]);
    }

}
