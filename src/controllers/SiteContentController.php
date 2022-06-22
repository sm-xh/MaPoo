<?php

class SiteContentController extends AppController
{
    public function NavbarSelector() : void
    {
        if(isset($_COOKIE['user'])){
            include __DIR__."/../../public/common/navbar_user.php";
        }
        else{
            include __DIR__."/../../public/common/navbar.php";
        }
    }
}