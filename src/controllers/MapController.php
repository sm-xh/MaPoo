<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/PlacesRepository.php';
require_once __DIR__ .'/../models/Pin.php';

require_once __DIR__."/../../config.php";


class MapController extends AppController {

    private $placeRepository;

    public function __construct()
    {
        parent::__construct();
        $this->placeRepository = new PlacesRepository();

    }

    public function map() {
        $this->render('map');
    }


    public function places()
    {
        $places = $this->placeRepository->getPlaces();

        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($places);
    }

    public function add_pin()
    {
        if (!$this->isPost()) {
            return $this->render('add_pin');
        }

        $coordinates_arr = explode(',', $_POST['coordinates']);
        $comment = $_POST['comment'];
        $location = $_POST['location-from-search'];

        $address_array = $this->getAddress($coordinates_arr[0], $coordinates_arr[1]);

        print_r($address_array);
//        try{
//            $this->placeRepository->addPin($pin);
//            return $this->render('add_pin', ['messages' => ['New pin added!']]);
//        }
//        catch (PDOException $e){
//            return $this->render('add_pin', ['error' => ['Pin not added!']]);
//
//        }
    }

    function getAddress($latitude, $longitude)
    {
        //google map api url
        $url = "https://maps.google.com/maps/api/geocode/json?latlng=$longitude,$latitude&key=" . GGL_API;
        // send http request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        return $json->results[0]->address_components[0]->long_name;
    }
}