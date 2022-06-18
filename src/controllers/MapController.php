<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/PlacesRespository.php';


class MapController extends AppController {

    public function __construct()
    {
        parent::__construct();
        $this->placeRepository = new PlaceRepository();

    }

    public function map() {
        $this->render('map');
    }

    public function add() {
        $this->render('add');
    }

    public function places()
    {
        $places= $this->placeRepository->getPlaces();

        header('Content-type: application/json');
        http_response_code(200);

        echo json_encode($places);
    }

    public function add_pin()
    {
        if (!$this->isPost()) {
            return $this->render('add_place');
        }

 //       $email = $_POST['description'];


        echo "<pre>";
        echo print_r($_POST,true);
        echo "</pre>";

//        $user = new User($email, password_hash($password, PASSWORD_DEFAULT), $name);
//
//        $this->userRepository->addUser($user);
//
//        return $this->render('register', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

}