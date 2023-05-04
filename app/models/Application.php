<?php

namespace App\models;

use App\base\Connection;
use PDOException;

class Application
{
    public static function create($user_id, $pet_id, $service_id, $worker_id, $date_provision, $time_provision, $total_duration)
    {
        //установим подключение для работы с транзакцией
        $conn = Connection::make();

        //транзакция
        try {

            //открываем транзакцию
            $conn->beginTransaction();

            $application_id = self::addApplication($pet_id, $user_id, $worker_id, $date_provision, $time_provision, $total_duration, $conn);

            self::addServiceInApplication($application_id, $service_id, $conn);
            //принимаем транзакцию
            $conn->commit();
        }
        //откатываем транзакцию в случае ошибки
        catch (PDOException $error) {
            $conn->rollBack();
            echo 'ошибка ' . $error->getMessage();
        }
    }

    public static function addApplication($pet_id, $client_id, $worker_id, $date_provision, $time_provision, $total_duration, $conn)
    {
        $count_deration = 0;
        foreach ($total_duration as $item) {
            $count_deration += $item;
        };

        $query = $conn->prepare('INSERT INTO applications (status_id, client_id, pet_id, worker_id, registration_date, date_provision, time_provision, total_duration) VALUES (:status_id, :client_id, :pet_id, :worker_id, :registration_date, :date_provision, :time_provision, :total_duration)');
        $query->execute(['status_id' => 1, 'client_id' => $client_id, 'pet_id' => $pet_id, 'worker_id' => $worker_id, 'registration_date' => date('Y-m-d'), 'date_provision' => $date_provision, 'time_provision' => $time_provision, 'total_duration' => $count_deration]);
        return $conn->lastInsertId();
    }

    private static function getParams($array, $value)
    {
        return implode(',', array_fill(0, count($array), $value));
    }

    public static function addServiceInApplication($application_id, $service_array, $conn)
    {
        $count = count($service_array);
        $queryText = 'INSERT INTO services_in_application(application_id, service_id) VALUES';
        $params = self::getParams($service_array, '(?, ?)');

        $queryText .= $params;
        $values = [];
        for ($i = 0; $i < $count; $i++) {
            $values[] = $application_id;
            $values[] = $service_array[$i];
        }

        $query = $conn->prepare($queryText);
        $query->execute($values);
    }

    public static function all()
    {
        $query = Connection::make()->query("SELECT orders.*, users.email as mail , statuses.name as status FROM orders INNER JOIN users ON users.id = user_id
        INNER JOIN statuses ON statuses.id = status_id");
        return $query->fetchAll();
    }
    public static function findProfile($client_id)
    {
        $query = Connection::make()->prepare("SELECT DISTINCT (SELECT COUNT(service_id) FROM services_in_application WHERE services_in_application.application_id = applications.id) as count, (SELECT SUM(services.price) FROM services_in_application, services WHERE services_in_application.service_id = services.id AND services_in_application.application_id = applications.id) as price, applications.id, clients.name as client, status_id, registration_date, statuses.name as status, pets.name as pet, breeds.name as breed, date_provision, time_provision, workers.name as worker FROM applications
        INNER JOIN clients ON applications.client_id = clients.id 
        INNER JOIN pets ON pets.id = applications.pet_id
        INNER JOIN breeds ON pets.breed_id = breeds.id 
        INNER JOIN statuses ON applications.status_id = statuses.id
        INNER JOIN workers ON applications.worker_id = workers.id
        WHERE applications.client_id =:client_id LIMIT 3");
        $query->execute([
            "client_id" => $client_id,
        ]);
        return $query->fetchAll();
    }
    public static function find($client_id)
    {
        $query = Connection::make()->prepare("SELECT DISTINCT (SELECT COUNT(service_id) FROM services_in_application WHERE services_in_application.application_id = applications.id) as count, (SELECT SUM(services.price) FROM services_in_application, services WHERE services_in_application.service_id = services.id AND services_in_application.application_id = applications.id) as price, applications.id, clients.name as client, status_id, registration_date, statuses.name as status, pets.name as pet, breeds.name as breed FROM applications
        INNER JOIN clients ON applications.client_id = clients.id 
        INNER JOIN pets ON pets.id = applications.pet_id
        INNER JOIN breeds ON pets.breed_id = breeds.id 
        INNER JOIN statuses ON applications.status_id = statuses.id
        WHERE applications.client_id =:client_id ");
        $query->execute([
            "client_id" => $client_id,
        ]);
        return $query->fetchAll();
    }

    public static function allInfo()
    {
        $query = Connection::make()->query("SELECT DISTINCT (SELECT COUNT(service_id) FROM services_in_application WHERE services_in_application.application_id = applications.id) as count, (SELECT SUM(services.price) FROM services_in_application, services WHERE services_in_application.service_id = services.id AND services_in_application.application_id = applications.id) as price, applications.id, clients.name as client, status_id, registration_date, statuses.name as status, pets.name as pet, breeds.name as breed FROM applications
        INNER JOIN clients ON applications.client_id = clients.id 
        INNER JOIN pets ON pets.id = applications.pet_id
        INNER JOIN breeds ON pets.breed_id = breeds.id 
        INNER JOIN statuses ON applications.status_id = statuses.id");
        return $query->fetchAll();
    }


    public static function update($status, $id)
    {
        $query = Connection::make()->prepare("UPDATE applications SET applications.status_id = :status WHERE applications.id = :id");

        $query->execute([
            "status" => $status,
            "id" => $id,
        ]);
    }

    public static function allServicesInByApplication($id)
    {
        $query = Connection::make()->prepare("SELECT DISTINCT (SELECT COUNT(service_id) FROM services_in_application WHERE services_in_application.application_id = applications.id) as count, (SELECT SUM(services.price) FROM services_in_application, services WHERE services_in_application.service_id = services.id AND services_in_application.application_id = applications.id) as allprice, application_id, date_provision, time_provision, duration, services.name as service, services.price as price, clients.name as client, status_id, registration_date, statuses.name as status, pets.name as pet, breeds.name as breed FROM services_in_application
        INNER JOIN applications ON applications.id = services_in_application.application_id
        INNER JOIN clients ON applications.client_id = clients.id 
        INNER JOIN pets ON pets.id = applications.pet_id
        INNER JOIN services ON services.id = services_in_application.service_id
        INNER JOIN breeds ON pets.breed_id = breeds.id 
        INNER JOIN workers ON workers.id = worker_id
        INNER JOIN statuses ON statuses.id = applications.status_id
        WHERE application_id = :id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }

    public static function ordersByStatuses($id)
    {
        $query = Connection::make()->prepare("SELECT DISTINCT (SELECT COUNT(service_id) FROM services_in_application WHERE services_in_application.application_id = applications.id) as count, (SELECT SUM(services.price) FROM services_in_application, services WHERE services_in_application.service_id = services.id AND services_in_application.application_id = applications.id) as price, applications.id, clients.name as client, status_id, registration_date, statuses.name as status, pets.name as pet, breeds.name as breed FROM applications
        INNER JOIN clients ON applications.client_id = clients.id 
        INNER JOIN pets ON pets.id = applications.pet_id
        INNER JOIN breeds ON pets.breed_id = breeds.id 
        INNER JOIN statuses ON applications.status_id = statuses.id
        WHERE applications.status_id = :id");
        $query->execute(["id" => $id]);
        return $query->fetchAll();
    }

    public static function workersTime($id, $date_provision)
    {
        $query = Connection::make()->prepare("SELECT workers.id, workers.name, applications.date_provision, applications.time_provision, applications.total_duration FROM applications INNER JOIN workers ON workers.id = applications.worker_id WHERE applications.worker_id = :id AND applications.date_provision = :date_provision");
        $query->execute(["id" => $id, "date_provision" => $date_provision]);
        return $query->fetchAll();
    }
}
