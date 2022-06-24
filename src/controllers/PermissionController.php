<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/PermissionRepository.php';

require_once __DIR__."/../../config.php";


class PermissionController extends AppController
{
    private $permissionRepository;

    public function __construct()
    {
        parent::__construct();
        $this->permissionRepository = new PermissionRepository();

    }

    public function admin() {
        $this->render('admin');
    }


    public function checkIfIsAdmin($cookie_user): void
    {
        $mail = $cookie_user['mail'];
        if(!$this->permissionRepository->isUserAdmin($mail)){
            $url = "http://$_SERVER[HTTP_HOST]";
            $msg = "unauthorized";
            header("Location: ${url}/index?$msg");
        }
    }

    public function checkIfLoggedIn($cookie_user): void
    {
        if(!isset($cookie_user)){
            $url = "http://$_SERVER[HTTP_HOST]";
            $msg = "unauthorized";
            header("Location: ${url}/index?$msg");
        }
    }

    public function unauthorizedPopUp(): void
    {
        if (isset($_GET['unauthorized'])) {
                echo "<div class='alert-box show'>";
                echo "<span class='fas fa-exclamation-circle'></span>";
                echo "<span class='msg' id='message'>";
                    echo "You are not logged in or don't have necessary permissions";
                echo "</span>";
                echo "<div class='close-btn'>";
                echo "<span class='fas fa-times''></span>";
                echo "</div>";
                echo "</div>";
        }
    }
}