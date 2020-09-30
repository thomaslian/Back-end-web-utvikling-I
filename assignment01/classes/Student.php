<?php

require_once('classes/University.php');


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

    /**
     * Sets the credits of a course that a student has taken
     * 
     * $param $courseCredit - The credits of the course
     */
    function setCourseCredit($courseCredit)
    {
        $this->courseCredit = $courseCredit;
    }

    /**
     * Sets the grade
     * 
     * @param $grade - Grade that the student got in a course
     */
    function setGrade($grade)
    {
        // Get the numbered grade
        $this->numberGrade = $this->getNumberGrade($grade);
        // Check if grade is 0
        if ($this->numberGrade == 0) {
            // Add 1 to failed courses (grade 0 = failed)
            $this->failedCourses++;
        } else {
            // Add 1 to completed courses
            $this->completedCourses++;
        }
    }

    /**
     * Calculates the sum of credits times grade
     */
    function calculateSumOfCourseCreditTimesGrade()
    {
        $this->sumOfCourseCreditTimesGrade += $this->numberGrade * $this->courseCredit;
    }

    /**
     * Caluclate the sum of credits taken
     */
    function calculateSumCreditsTaken()
    {
        $this->sumCreditsTaken += $this->courseCredit;
    }

    /**
     * Calculate the GPA
     */
    function calculateGPA()
    {
        $this->gpa = $this->sumOfCourseCreditTimesGrade / $this->sumCreditsTaken;
    }

    /** 
     * Returns the students GPA
     */
    function getGPA()
    {
        return $this->gpa;
    }

    /**
     * Returns the number of completed courses
     */
    function getCompletedCourses()
    {
        return $this->completedCourses;
    }

    /**
     * Returns the number of failed courses
     */
    function getFailedCourses()
    {
        return $this->failedCourses;
    }

    /**
     * Get the status of the student. Based on GPA
     */
    function getStatus()
    {
        // Return the status of the student based on the calculated GPA
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
     * Convert UNIX time to YYYY-MM-DD. Example 1990-12-01
     */
    function convertUnixTime($unixTime)
    {
        return gmdate("Y-m-d", $unixTime);
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
