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

    /**
     * Sets the participation and if the student failed or not.
     * 
     * @param $grade - Grade of the student participating in this course
     */
    function setParticipant($grade)
    {
        // Add 1 to the number of participants
        $this->courseParticipants++;
        // Get the numbered grade
        $numberGrade = $this->getNumberGrade($grade);
        // Sum the grades (for calculating average)
        $this->sumGrades += $numberGrade;
        // Check if grade is 0
        if ($numberGrade == 0) {
            // Add 1 to the failed participants (grade 0 = failed)
            $this->failedParticipants++;
        } else {
            // Add 1 to the passed participants
            $this->passedParticipants++;
        }
    }

    /**
     * Get the participants of 
     */
    function getCourseParticipants()
    {
        return $this->courseParticipants;
    }

    /**
     * Get the passed participants 
     */
    function getPassedParticipants()
    {
        return $this->passedParticipants;
    }

    /**
     * Get the failed participants
     */
    function getFailedParticipants()
    {
        return $this->failedParticipants;
    }

    /**
     * Convert UNIX time to Year. Format example 1990
     */
    function convertUnixTime($unixTime)
    {
        return gmdate("Y", $unixTime);
    }

    /**
     * Get the average grade
     */
    function getAverageGrade()
    {
        // Calculate the average
        $average =  $this->sumGrades / $this->courseParticipants;
        // Return the letter grade that fits the average
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
