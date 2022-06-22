<?php

class Pin
{
    private string $comment;
    private array $coordinates;
    private array $address;
    private string $details;


    public function __construct(
        string $comment,
        array $coordinates,
        array $address,
        string $details
    ) {
        $this->comment = $comment;
        $this->coordinates = $coordinates;
        $this->address = $address;
        $this->details = $details;
    }

    /**
     * @return string
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @return array
     */
    public function getDetails(): string
    {
        return $this->details;
    }

    /**
     * @return array
     */
    public function getCoordinates(): array
    {
        return $this->coordinates;
    }


    public function formatCoordinatesToJSON(): string
    {
        $json_data = array("point"=>$this->coordinates);
        return json_encode($json_data);
    }



    /**
     * @return array
     */
    public function getAddress(): array
    {
        return $this->address;
    }

}