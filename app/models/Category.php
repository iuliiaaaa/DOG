<?php

namespace App\models;

use App\base\Connection;

class Category
{
    public static function all()
    {
        $query = Connection::make()->query("SELECT id, name FROM categories");
        return $query->fetchAll();
    }

    public static function find($name)
    {
        $query = Connection::make()->prepare("SELECT name FROM categories WHERE name = :name");
        $query->execute(["name" => $name]);
        return $query->fetch();
    }

    public static function deleteCategory($id)
    {
        $query = Connection::make()->prepare("DELETE FROM categories WHERE id = :id");
        $query->execute(["id" => $id]);
    }

    public static function addCategory ($category_name){

        $category = self::find($category_name);
        if(!$category){
            $query = Connection::make()->prepare("INSERT INTO categories (name) VALUES (:category_name)");
            $query->execute(["category_name"=> $category_name]);
        }
    }
}
