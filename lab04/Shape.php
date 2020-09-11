<?php
class Shape
{
    private $area;
    static $num_circ = 0;
    static $num_rect = 0;

    function __construct()
    {
        $classType = get_class($this);
        if ($classType == 'Circle') {
            ++Shape::$num_circ;
        } elseif ($classType == 'Rectangle') {
            ++Shape::$num_rect;
        } else {
            echo 'Could not find classtype';
        }
    }

    protected function calculateArea()
    {
        $this->area = 0;
    }

    protected function setArea($area)
    {
        $this->area = $area;
    }

    protected function getArea()
    {
        return $this->area;
    }
}
