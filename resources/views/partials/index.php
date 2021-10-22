<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


interface Reptile
{
    public function layEgg() : ReptileEgg;
}

class FireDragon
{
    public function layEgg() : Reptile{
        return $this->layEgg();
    }

}

class ReptileEgg extends FireDragon
{
    public function __construct(string $reptileType)
    {

    }

    public function hatch() : ?Reptile
    {
        return $this->layEgg();
    }
}
