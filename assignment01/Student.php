<?php

require_once('University.php');


class Student extends University
{
    private $courseCredit;
    private $numberGrade;
    private $sumOfCourseCreditTimesGrade;
    private $sumCreditsTaken;
    private $gpa;
    private $completedCourses = 0;
    private $failedCourses = 0;


    function __construct()
    {
        parent::__construct();
    }

    function setCourseCredit($courseCredit)
    {
        $this->courseCredit = $courseCredit;
    }

    function setGrade($grade)
    {
        $this->numberGrade = $this->getNumberGrade($grade);
        if ($this->numberGrade == 0) {
            $this->failedCourses++;
        } else {
            $this->completedCourses++;
        }
    }

    function calculateSumOfCourseCreditTimesGrade()
    {
        $this->sumOfCourseCreditTimesGrade += $this->numberGrade * $this->courseCredit;
    }

    function calculateSumCreditsTaken()
    {
        $this->sumCreditsTaken += $this->courseCredit;
    }

    function calculateGPA()
    {
        $this->gpa = $this->sumOfCourseCreditTimesGrade / $this->sumCreditsTaken;
    }

    function getGPA()
    {
        return $this->gpa;
    }

    function getCompletedCourses()
    {
        return $this->completedCourses;
    }

    function getFailedCourses()
    {
        return $this->failedCourses;
    }

    function getStatus()
    {
        if ($this->gpa < 2) {
            return "Unsatisfactory";
        } else if ($this->gpa >= 2 && $this->gpa < 3) {
            return "Satisfactory";
        } else if ($this->gpa >= 3 && $this->gpa < 4) {
            return "Honour";
        } else if ($this->gpa >= 4 && $this->gpa <= 5) {
            return "High honour";
        }
        return $this->gpa;
    }

    /**
     * Takes a letter grade (example A), and turns it into a numbered grade
     */
    private function getNumberGrade($letterGrade)
    {
        switch ($letterGrade) {
            case "A":
                return 5;
            case "B":
                return 4;
            case "C":
                return 3;
            case "D":
                return 2;
            case "E":
                return 1;
            case "F":
                return 0;
            default:
                error_log("Grade was not found");
        }
    }
}
