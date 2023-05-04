<?php

namespace App\models;

use App\base\Connection;

class Breed
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT breeds.*, categories.name as category FROM breeds INNER JOIN categories ON breeds.category_id = categories.id ORDER BY id ASC");
        return $query->fetchAll();
    }

    public static function allCategory($category)
    {
        $query = Connection::make()->prepare("SELECT breeds.* FROM breeds INNER JOIN categories ON categories.id = breeds.category_id WHERE category_id = :category");
        $query->execute(["category" => $category]);
        return $query->fetchAll();
    }

    public static function find($id)
    {
        $query = Connection::make()->prepare("SELECT breeds.* FROM breeds WHERE id = :id");
        $query->execute(["id" => $id]);
        return $query->fetch();
    }

    public static function deleteBreed($id)
    {
        $query = Connection::make()->prepare("DELETE FROM breeds WHERE id = :id");
        $query->execute(["id" => $id]);
    }

    public static function addBreed($data, $newName)
    {
        $query = Connection::make()->prepare("INSERT INTO breeds (name, image, category_id) VALUES (:name, :image, :category_id)");
        $query->execute([
            ":name" => $data["name"],
            ":category_id" => $data["category_id"],
            ":image" => $newName
        ]);
    }

    public static function viewBreedInCategory($id)
    {
        $query = Connection::make()->prepare("SELECT breeds.*, categories.name as category FROM categories INNER JOIN breeds ON breeds.category_id = categories.id WHERE category_id = :category_id");
        $query->execute([
            'category_id' => $id
        ]);
        return $query->fetchAll();
    }

    private static function getParams($array)
    {
        return implode(',', array_fill(0, count($array), '?'));
    }

    //получаем товары по указанным категориям
    public static function breedsByManyCategories($categories)
    {
        //формируем параметры для запроса
        $params = self::getParams($categories);
        $query = Connection::make()->prepare("SELECT breeds.*, categories.name as category FROM categories INNER JOIN breeds ON breeds.category_id = categories.id WHERE category_id in ($params)");
        $query->execute($categories);
        return $query->fetchAll();
    }

    public static function update($data, $img)
    {
        $query = Connection::make()->prepare("UPDATE breeds SET breeds.name = :name, category_id = :category_id, image = :image WHERE breeds.id = :id");
        $query->execute([
            "name" => $data["name"],
            "category_id" => $data["category_id"],
            "image" => $img,
            "id" => $data["id"]
        ]);
        $breed = $query->fetch();
        return $breed;
    }
}
