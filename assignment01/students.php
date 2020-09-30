<html>

<head>
    <title>Students</title>

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
    // Require the File.php and Student.php file
    require 'classes/File.php';
    require 'classes/Student.php';

    // Get the student database file and its content
    $studentsFile = new File("studentsDatabase.csv");
    // Set the content in the students array
    $students = $studentsFile->getFileContent();

    // Get the grade database file and its content
    $gradesFile = new File("gradesDatabase.csv");
    // Set the content in the grades array
    $grades = $gradesFile->getFileContent();

    // Create an array to store students with information
    $studentsWithGrades = [];
    // Go thorugh each student
    foreach ($students as $studentInfo) {
        // Create a new instance of the student class
        $student = new Student;
        // Go thorugh each grade
        foreach ($grades as $grade) {
            // Check if grade belongs to the current student
            if ($studentInfo["Student number"] == $grade["Student number"]) {
                // Grade does belong.
                // Set the course credit
                $student->setCourseCredit($grade["Number of credits"]);
                // Set the grade
                $student->setGrade($grade["Grade"]);
                // Calculate sum of coursecredits times grade
                $student->calculateSumOfCourseCreditTimesGrade();
                // Calculate sum of credits taken
                $student->calculateSumCreditsTaken();
            }
        }
        // Calculate the student GPA
        $student->calculateGPA();

        // Add the current student info to the studentsWithGrades array
        array_push(
            $studentsWithGrades,
            [
                "Student number" => $studentInfo["Student number"],
                "First name" => $studentInfo["First name"],
                "Last name" => $studentInfo["Last name"],
                "DOB" => $student->convertUnixTime($studentInfo["DOB"]),
                "Courses completed" => $student->getCompletedCourses(),
                "Courses failed" => $student->getFailedCourses(),
                "GPA" => $student->getGPA(),
                "Status" => $student->getStatus()
            ]
        );
    }


    // Sort students by GPA
    usort($studentsWithGrades, function ($a, $b) {
        return $a['GPA'] < $b['GPA'];
    });

    // Set the number of unique students and display them
    $numberOfStudents = University::$num_student;
    echo "<p>Number of students: $numberOfStudents</p>";

    // Create a table and list the table headings
    echo "<table><tr>";
    foreach (array_keys($studentsWithGrades[0]) as $header) {
        echo "<th>$header</th>";
    }
    echo "</tr>";


    // List students in a table
    foreach ($studentsWithGrades as $student) {
        echo "<tr>";
        foreach ($student as $info) {
            echo "<td>$info</td>";
        }
        echo "</tr>";
    }

    echo "</table>";
    ?>

</body>

</html>