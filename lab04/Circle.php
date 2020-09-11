<?php
require_once('Shape.php');

class Circle extends Shape
{
    private $radius;
    private $pi = 3.14;

    function __construct()
    {
        parent::__construct();
    }

    function calculateArea()
    {
        parent::calculateArea();
        $area = $this->pi * $this->radius * $this->radius;
        parent::setArea($area);
    }

    function getArea()
    {
        return parent::getArea();
    }

    function setRadius($radius)
    {
        $this->radius = $radius;
    }

    function getRadius()
    {
        return $this->radius;
    }
}

?>
