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
    require 'classes/File.php';
    include 'classes/Course.php';

    $coursesFile = new File("coursesDatabase.csv");
    $courses = $coursesFile->getFileContent();

    $gradesFile = new File("gradesDatabase.csv");
    $grades = $gradesFile->getFileContent();

    $coursesWithParticipants = [];
    foreach ($courses as $courseInfo) {
        $course = new Course;
        foreach ($grades as $grade) {
            if ($courseInfo["Course code"] == $grade["Course code"]) {
                $course->setParticipant($grade["Grade"]);
            }
        }
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


    $numberOfUniqueCourses = University::$num_course;

    echo "<p>Number of courses: $numberOfUniqueCourses</p>";


    echo "<table><tr>";
    foreach (array_keys($coursesWithParticipants[0]) as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";


    // List students in a table
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