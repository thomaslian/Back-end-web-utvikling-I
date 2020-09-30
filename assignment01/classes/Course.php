<?php

require_once('classes/University.php');


class Course extends University
{
    private $courseParticipants = 0;
    private $passedParticipants = 0;
    private $failedParticipants = 0;
    private $sumGrades = 0;


    function __construct()
    {
        parent::__construct();
    }

    function setParticipant($grade)
    {
        $this->courseParticipants++;
        $numberGrade = $this->getNumberGrade($grade);
        $this->sumGrades += $numberGrade;
        if ($numberGrade == 0) {
            $this->failedParticipants++;
        } else {
            $this->passedParticipants++;
        }
    }

    function getCourseParticipants()
    {
        return $this->courseParticipants;
    }

    function getPassedParticipants()
    {
        return $this->passedParticipants;
    }

    function getFailedParticipants()
    {
        return $this->failedParticipants;
    }

    function convertUnixTime($unixTime)
    {
        return gmdate("Y", $unixTime);
    }

    function getAverageGrade()
    {
        $average =  $this->sumGrades / $this->courseParticipants;
        if ($average < 0.49) {
            return "F";
        } else if ($average > 0.51 && $average <= 1.5) {
            return "E";
        } else if ($average > 1.51 && $average <= 2.5) {
            return "D";
        } else if ($average > 2.51 && $average <= 3.5) {
            return "C";
        } else if ($average > 3.51 && $average <= 4.5) {
            return "B";
        } else if ($average > 4.51) {
            return "A";
        } else {
            return "Grade format is not correct!";
        }
        return true;
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
