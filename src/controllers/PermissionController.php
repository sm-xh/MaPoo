<?php

class PermissionController
{
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
                    echo "You need to be logged to do it!";
                echo "</span>";
                echo "<div class='close-btn'>";
                echo "<span class='fas fa-times''></span>";
                echo "</div>";
                echo "</div>";
        }
    }
}