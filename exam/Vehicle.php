<?php

class Vehicle
{
    static $numCars = 0;
    static $numTrucks = 0;

    private $NumOfTires;
    protected $brand;

    function __construct()
    {
        $classType = get_class($this);
        if ($classType == 'Car') {
            ++Vehicle::$numCars;
        } elseif ($classType == 'Truck') {
            ++Vehicle::$numTrucks;
        }
    }

    protected function setNumOfTires($NumOfTires)
    {
        $this->NumOfTires = $NumOfTires;
    }
}


class Car extends Vehicle
{
    function __construct($brand)
    {
        parent::__construct();
        $this->brand = $brand;
        parent::setNumOfTires(4);
    }
}


class Truck extends Vehicle
{
    function __construct($brand)
    {
        parent::__construct();
        $this->brand = $brand;
        parent::setNumOfTires(6);
    }

    function overrideNumOfTires($numberOfTires)
    {
        parent::setNumOfTires($numberOfTires);
    }
}
