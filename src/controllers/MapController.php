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

        // format address using google api
        $address_array = $this->getAddress($coordinates_arr[0], $coordinates_arr[1]);

        // get details about toilet
        $details_arr = json_encode(array(
            'free'=> $_POST['free'] ? 'on' : 'off',
            'unisex'=> $_POST['unisex'] ? 'on' : 'off',
            'disabled'=> $_POST['disabled'] ? 'on' : 'off',
            'baby_change'=> $_POST['baby_change'] ? 'on' : 'off',
            ));

        $pin = new Pin($comment ,$coordinates_arr, $address_array, $details_arr);
        $user = json_decode($_COOKIE['user'], true);
        $user =  $user['email'];

        try{
            $this->placeRepository->addPin($pin, $user);
            return $this->render('add_pin', ['messages' => ['New pin added!']]);
        }
        catch (PDOException $e){
            return $this->render('add_pin', ['messages' => ['Pin not added!']]);
        }
    }

    function getAddress($latitude, $longitude)
    {
        //google map api url
        $url = "https://maps.google.com/maps/api/geocode/json?latlng=$longitude,$latitude&key=" . GGL_API;
        // send http request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);

        $address = array(
            "house_no"=>$json->results[0]->address_components[0]->long_name,
            "street"=>$json->results[1]->address_components[1]->long_name,
            "city"=>$json->results[1]->address_components[3]->long_name,
            "voivodeship"=>$json->results[1]->address_components[5]->long_name,
            "country"=>$json->results[1]->address_components[6]->long_name,
            "zip-code"=>$json->results[1]->address_components[7]->long_name,
        );
        return $address;
    }
}