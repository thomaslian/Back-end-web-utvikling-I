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
    require 'File.php';

    include 'Student.php';

    $studentsFile = new File("studentsDatabase.csv");
    $students = $studentsFile->getFileContent();

    $gradesFile = new File("gradesDatabase.csv");
    $grades = $gradesFile->getFileContent();

    $studentsWithGrades = [];
    foreach ($students as $studentInfo) {
        $student = new Student;
        foreach ($grades as $grade) {
            if ($studentInfo["Student number"] == $grade["Student number"]) {
                $student->setCourseCredit($grade["Number of credits"]);
                $student->setGrade($grade["Grade"]);
                $student->calculateSumOfCourseCreditTimesGrade();
                $student->calculateSumCreditsTaken();
            }
        }
        $student->calculateGPA();

        array_push(
            $studentsWithGrades,
            [
                "Student number" => $studentInfo["Student number"],
                "First name" => $studentInfo["First name"],
                "Last name" => $studentInfo["Last name"],
                "DOB" => $studentInfo["DOB"],
                "Courses completed" => $student->getCompletedCourses(),
                "Courses failed" => $student->getFailedCourses(),
                "GPA" => $student->getGPA(),
                "Status" => $student->getStatus()
            ]
        );
    }


    // Sort array by GPA
    usort($studentsWithGrades, function ($a, $b) {
        return $a['GPA'] < $b['GPA'];
    });



    $numberOfStudents = University::$num_student;

    echo "<p>Number of students: $numberOfStudents</p>";


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