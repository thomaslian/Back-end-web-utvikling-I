<?php
require_once('Shape.php');

class Rectangle extends Shape
{
    private $width;
    private $length;

    function __construct()
    {
        parent::__construct();
    }

    function calculateArea()
    {
        parent::calculateArea();
        $area = $this->width * $this->length;
        parent::setArea($area);
    }

    function getArea()
    {
        return parent::getArea();
    }

    function setWidth($width)
    {
        $this->width = $width;
    }

    function getWidth()
    {
        return $this->width;
    }

    function setLength($length)
    {
        $this->length = $length;
    }

    function getLength()
    {
        return $this->length;
    }
}

?>
