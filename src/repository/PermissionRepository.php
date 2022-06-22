<?php

require_once 'Repository.php';

class PermissionRepository extends Repository{
    private $email;

    public function __construct(){
        $this->email = json_decode($_COOKIE['user'], true)['email'];
    }

    // todo
    public function isUserAdmin(): bool
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT "website_permission" FROM "users" JOIN public."user_permission" ON users.id = "user_permission".id WHERE "email"=:email'
        );
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        if($respond['WebsitePremission']===1){
            return true;
        }
        else{
            return false;
        }
    }
}