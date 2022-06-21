<?php

class Pin
{
    private string $comment;
    private string $coordinates;
    private string $address;


    public function __construct(
        string $comment,
        string $coordinates,
        string $address
    ) {
        $this->comment = $comment;
        $this->coordinates = $coordinates;
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return string
     */
    public function getCoordinates(): string
    {
        return $this->coordinates;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }


}