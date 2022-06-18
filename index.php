<?php
require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('', 'DefaultController');
Routing::get('index', 'DefaultController');
Routing::get('info', 'DefaultController');

Routing::get('login', 'SecurityController');
Routing::get('register', 'SecurityController');

Routing::get('map', 'MapController');
Routing::get('places', 'MapController');
Routing::get('add', 'MapController');
Routing::get('add_pin', 'MapController');

Routing::run($path);