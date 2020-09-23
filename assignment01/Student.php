<?php

require_once('University.php');


class Student extends University
{
    private $gpa;
    private $name;
    private $courseCredit;
    private $grade;
    private $creditsTaken = 1;

    function __construct()
    {
        parent::__construct();
    }

    function calculateGPA()
    {
        $numberGrade = 0;

        switch ($this->grade) {
            case "A":
                $numberGrade = 5;
                break;
            case "B":
                $numberGrade = 4;
                break;
            case "C":
                $numberGrade = 3;
                break;
            case "D":
                $numberGrade = 2;
                break;
            case "E":
                $numberGrade = 1;
                break;
            case "F":
                $numberGrade = 0;
                break;
            default:
                error_log("Grade was not found");
        }
        $this->gpa = $this->courseCredit * $numberGrade / $this->courseCredit;
        
    }

    function getGPA()
    {
        return $this->gpa;
    }

    function setName($name)
    {
        $this->name = $name;
    }

    function getName()
    {
        return $this->name;
    }

    function setCourseCredit($courseCredit)
    {
        $this->courseCredit = $courseCredit;
    }

    function setGrade($grade)
    {
        $this->grade = $grade;
    }
}
