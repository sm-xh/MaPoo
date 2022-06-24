<?php

require_once 'Repository.php';

class PermissionRepository extends Repository{
    private $email;

    public function isUserAdmin(): bool
    {
        $stmt = $this->database->connect()->prepare(
            'SELECT per.user_role FROM users u JOIN user_permissions per ON u.id_user = per.id_user WHERE u.email LIKE :email'
        );
        $stmt->bindParam(':email', $this->email, PDO::PARAM_STR);
        $stmt->execute();
        $respond = $stmt->fetch(PDO::FETCH_ASSOC);

        if($respond['user_role']===1){
            return true;
        }
        else{
            return false;
        }
    }
}