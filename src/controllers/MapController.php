<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/PlacesRepository.php';
require_once __DIR__ .'/../models/Pin.php';


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

    public function add() {
        $this->render('add');
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
            return $this->render('add');
        }

        $coordinates = $_POST['coordinates'];
        $comment = $_POST['comment'];
        $location = $_POST['location-from-search'];

        $pin = new Pin($coordinates, $comment, $location);

        $this->placeRepository->addPin($pin);
    }

    function getAddress($latitude, $longitude)
    {
        //google map api url
        $url = "http://maps.google.com/maps/api/geocode/json?latlng=$latitude,$longitude";

        // send http request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        $address = $json->results[0]->formatted_address;
        return $address;
    }
}