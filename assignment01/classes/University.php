<?php

class University
{

    private $area;
    static $num_student = 0;
    static $num_course = 0;

    function __construct()
    {
        $classType = get_class($this);
        if ($classType == 'Student') {
            ++University::$num_student;
        } elseif ($classType == 'Course') {
            ++University::$num_course;
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
