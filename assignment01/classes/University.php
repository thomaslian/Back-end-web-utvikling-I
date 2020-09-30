<?php

class University
{
    static $num_student = 0;
    static $num_course = 0;

    function __construct()
    {
        // Get the child class
        $classType = get_class($this);
        if ($classType == 'Student') {
            // Add 1 to the number of students if the student class is called
            ++University::$num_student;
        } elseif ($classType == 'Course') {
            // Add 1 to the number of courses if the courses class is called
            ++University::$num_course;
        } else {
            echo 'Could not find classtype';
        }
    }
}
