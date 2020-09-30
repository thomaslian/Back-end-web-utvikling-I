<html>

<head>
    <title>Courses</title>

    <!-- Styling -->
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>


<!-- Body -->

<body>

    <?php
    // Require the File.php and Course.php file
    require 'classes/File.php';
    require 'classes/Course.php';

    // Get the course database file and its content
    $coursesFile = new File("coursesDatabase.csv");
    // Set the content in the courses array
    $courses = $coursesFile->getFileContent();

    // Get the grades database file and its content
    $gradesFile = new File("gradesDatabase.csv");
    // Set the content in the grades array
    $grades = $gradesFile->getFileContent();

    // Create an array to store courses with information
    $coursesWithParticipants = [];
    // Go through each course
    foreach ($courses as $courseInfo) {
        // Create a new instance of the course class
        $course = new Course;
        // Go through each grade
        foreach ($grades as $grade) {
            // Check if grade belongs to the current course
            if ($courseInfo["Course code"] == $grade["Course code"]) {
                // Grade does belong. 
                // Set particion and pass the grade
                $course->setParticipant($grade["Grade"]);
            }
        }
        // Add the current course info to the coursesWithParticipants array
        array_push($coursesWithParticipants, [
            "Course code" => $courseInfo["Course code"],
            "Course name" => $courseInfo["Course name"],
            "Course year" => $course->convertUnixTime($courseInfo["Course year"]),
            "Course semester" => $courseInfo["Course semester"],
            "Instructor name" => $courseInfo["Instructor name"],
            "Number of credits" => $courseInfo["Number of credits"],
            "Number of students registered" => $course->getCourseParticipants(),
            "Number of students passed" => $course->getPassedParticipants(),
            "Number of students failed" => $course->getFailedParticipants(),
            "Average grade taken" => $course->getAverageGrade()
        ]);
    }

    // Sort courses by number of students
    usort($coursesWithParticipants, function ($a, $b) {
        return $a['Number of students registered'] < $b['Number of students registered'];
    });

    // Set the number of unique courses and display them
    $numberOfUniqueCourses = University::$num_course;
    echo "<p>Number of courses: $numberOfUniqueCourses</p>";


    // Create a table and list the table headings
    echo "<table><tr>";
    foreach (array_keys($coursesWithParticipants[0]) as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";

    // List courses in a table
    foreach ($coursesWithParticipants as $course) {
        echo "<tr>";
        foreach ($course as $info) {
            echo "<td>$info</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

</body>

</html>