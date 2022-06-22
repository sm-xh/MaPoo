<?php

require_once 'AppController.php';
require_once __DIR__ .'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';
require_once __DIR__.'/../repository/CookiesRepository.php';
require_once __DIR__.'/../repository/PermissionRepository.php';

class SecurityController extends AppController {

    private $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
        $this->cookieRepository = new CookiesRepository();
    }

    public function login()
    {
        $userRepository = new UserRepository();
        $cookieRepository = new CookiesRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];

        $user = $userRepository->getUser($email);

        if (!$user) {
            return $this->render('login', ['messages' => ['User not found!']]);
        }

        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }
        if (!password_verify($_POST['password'], $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong username or password!']]);
        }

        $cookieRepository->setCookie($user->getEmail());

        $url = "http://$_SERVER[HTTP_HOST]";
        return $this->render('map', ['messages' => ['You\'ve been succesfully registrated!']]);

    }


    public function register()
    {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];
        $name = $_POST['name'];

        $user = new User($email, password_hash($password, PASSWORD_DEFAULT), $name);

        $this->userRepository->addUser($user);

        return $this->render('register', ['messages' => ['You\'ve been succesfully registrated!']]);
    }

    public function logout(){
        //delete cookie from db
        $cookieRepository = new CookiesRepository();
        $cookieRepository->deleteCookieFromDatabase();
        //delete cookie from browser storage
        unset($_COOKIE['user']);
        setcookie('user', null, -1, '/');

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/");
    }
}