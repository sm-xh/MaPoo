<?php
error_reporting(E_ERROR | E_PARSE);

require_once 'Repository.php';


class CookiesRepository extends Repository
{
    public function editCookie($user_name, $email, $name, $surname, $code){
        $expired = time() + (86400 * 30);
        setcookie('user', json_encode(['user_name' => $user_name, 'email' => $email,'name' => $name, 'surname'=>$surname, 'code' => $code]), $expired, '/');
    }

    public function setCookie(string $user_email){
        $expired = time() + (86400 * 30);
        $randomString = substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            ceil(250/strlen($x)) )),1,250);

        $stmt = $this->database->connect()->prepare('
        SELECT email FROM users WHERE email LIKE :email
        ');
        $stmt->bindParam(':email', $user_email, PDO::PARAM_STR);
        $stmt->execute();
        $db_response = $stmt->fetch(PDO::FETCH_ASSOC);

        setcookie('user', json_encode(['email' => $user_email, 'code' => $randomString]), $expired, '/');

        $db_response = $this->getSessionByEmail($user_email);
        $this->setSession($user_email, $randomString, $db_response);
    }

    private function getSessionByEmail(string $email){
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM sessions WHERE email LIKE :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    private function setSession(string $email, string $code, $db_response){
        $query = 'UPDATE public.sessions SET cookie_code=:code WHERE email LIKE :email';
        if(!$db_response){
            $query = 'INSERT INTO public.sessions (email, cookie_code) VALUES (:email, :code)';
        }

        $stmt = $this->database->connect()->prepare($query);

        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':code', $code, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function checkCookieInDatabase() : bool{
        $cookie = json_decode($_COOKIE['user'], true);

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.sessions WHERE email = :email AND cookie_code = :code
        ');
        $stmt->bindParam(':email', $cookie['email'], PDO::PARAM_STR);
        $stmt->bindParam(':code', $cookie['code'], PDO::PARAM_STR);
        $stmt->execute();

        $db_response = $stmt->fetch(PDO::FETCH_ASSOC);
        if($db_response){
            return True;
        }
        return False;
    }

    public function deleteCookieFromDatabase(){
        $cookie = json_decode($_COOKIE['user'], true);

        $stmt = $this->database->connect()->prepare('
            DELETE FROM public.sessions WHERE email = :email AND cookie_code = :code
        ');
        $stmt->bindParam(':email', $cookie['email'], PDO::PARAM_STR);
        $stmt->bindParam(':code', $cookie['code'], PDO::PARAM_STR);
        $stmt->execute();

    }
}