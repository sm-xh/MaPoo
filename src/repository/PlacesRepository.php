<?php

error_reporting(E_ERROR | E_PARSE);

require_once 'Repository.php';

class PlacesRepository extends Repository
{

    public function getPlaces(): array
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM pins;
        ');
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);;
    }

    public function addPin(Pin $pin): void
    {
        $pdo = $this->database->connect();

        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare('
            INSERT INTO pins (description, coordinates) VALUES (:comment, :coordinates);
        ');
            $comment = $pin->getComment();
            $coordinates = $pin->getCoordinates();
            $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
            $stmt->bindParam(':coordinates', $coordinates, PDO::PARAM_STR);
            $stmt->execute();

            $last_entry = pg_last_oid($stmt);
            $stmt = $pdo->prepare('
            INSERT INTO addresses (id_pin, city) VALUES (:last_entry, :address::text);
        ');

            $address = $pin->getAddress();
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':last_entry', $last_entry, PDO::PARAM_INT);
            $stmt->execute();

            $pdo->commit();
        } catch (\PDOException $e) {
            $pdo->rollBack();
            throw $e;
        }

    }
}