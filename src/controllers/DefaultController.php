<?php

require_once 'AppController.php';

class DefaultController extends AppController {

    public function __construct(){
        parent::__construct();
    }

    public function index() {
        $this->render('index');
    }

    public function info() {
        $this->render('info');
    }

}