<?php

class Pin
{
    private $comment;
    private $coordinates;
    private $address;


    public function __construct(
        string $comment,
        string $coordinates,
        string $address
    ) {
        $this->email = $comment;
        $this->password = $coordinates;
        $this->name = $address;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

}