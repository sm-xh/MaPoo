<?php

error_reporting(E_ERROR | E_PARSE);

require_once 'Repository.php';
require_once __DIR__.'/../repository/UserRepository.php';


class PlacesRepository extends Repository
{

    public function getPlaces(): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT t.* FROM public.pin_info t
        ');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function addPin(Pin $pin, $email): void
    {
        $pdo = $this->database->connect();

        try {
            $pdo->beginTransaction();

                //query no1 - add new pin
                $stmt = $pdo->prepare('
                INSERT INTO pins (description, coordinates, details) VALUES (:comment, :coordinates, :details);
            ');
                $comment = $pin->getComment();
                $details = $pin->getDetails();
                $coordinates = $pin->formatCoordinatesToJSON();

                $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
                $stmt->bindParam(':coordinates', $coordinates, PDO::PARAM_STR);
                $stmt->bindParam(':details', $details, PDO::PARAM_STR);
                $stmt->execute();

                //query no2 - add details to the pin
                $id_pin = $pdo->lastInsertId();
                $stmt = $pdo->prepare('
                INSERT INTO addresses (id_pin, country, city, zip, street, house_number) 
                    VALUES (:id_pin, :country, :city, :zip, :street, :house_number);
            ');

                $address = $pin->getAddress();
                $stmt->bindParam(':id_pin', $id_pin, PDO::PARAM_INT);
                $stmt->bindParam(':country', $address['country'], PDO::PARAM_STR);
                $stmt->bindParam(':city', $address['city'], PDO::PARAM_STR);
                $stmt->bindParam(':zip', $address['zip-code'], PDO::PARAM_STR);
                $stmt->bindParam(':street', $address['street'], PDO::PARAM_STR);
                $stmt->bindParam(':house_number', $address['house_no'], PDO::PARAM_STR);
                $stmt->execute();

                //query no3 - assign new pin to user
                $stmt = $pdo->prepare('
                INSERT INTO "pin-authors" (id_user, id_pin)
                    VALUES (:id_user, :id_pin);
            ');

                $userRepo = new UserRepository();
                $id_user = $userRepo->getUserId($email);

                $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $stmt->bindParam(':id_pin', $id_pin, PDO::PARAM_INT);
                $stmt->execute();

                $pdo->commit();
        } catch (\PDOException $e) {
            echo $e;
            $pdo->rollBack();
            throw $e;
        }

    }
}