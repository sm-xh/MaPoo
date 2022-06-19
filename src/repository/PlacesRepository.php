<?php

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

    public function addPin(Pin $pin): array
    {
        $stmt = $this->database->connect()->prepare('
         INSERT INTO pins (description, coordinates) VALUES () RETURNING id_pin as new_pin;
            INSERT INTO addresses (id_pin, city) VALUES (new_pin, $address);
        ');
        $stmt->execute();

        $stmt->execute([
            $pin->getEmail(),
            $pin->getPassword()
        ]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);;
    }
}