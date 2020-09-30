<html>

<head>
    <title>Data</title>

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
    <form method='post' action='data.php' enctype='multipart/form-data'>
        <p>Select File: </p>
        <input type='file' name='filename' size='10'>
        <input type='submit' value='Upload'>
    </form>

    <?php
    // Require the File.php file
    require 'classes/File.php';

    // Check if a file is selected
    if ($_FILES) {
        // Add the name of the file to the name variable
        $name = $_FILES['filename']['name'];
        // Move the uploaded file to the data folder
        move_uploaded_file($_FILES['filename']['tmp_name'], "data/" . $name);
        // Create a new instance of the uploaded file
        $file = new File($name);
        // Get the content of the uploaded file
        $contentArray = $file->getFileContent();

        // Create arrays to store the students and student grades
        $students = [];
        $studentGrades = [];
        // Go through each row in the uploaded file
        foreach ($contentArray as $content) {
            // Create a variable that says if the student is already added
            $isStudentAdded = false;
            // Check if anything have been added to the students array
            if ($students) {
                // Go through the students that are already added
                foreach ($students as $key => $addedStudent) {
                    // Check if the student from the current line in the uploaded file is one of the added students
                    if ($addedStudent['Student number'] == $content['Student number']) {
                        // Student already exists
                        $isStudentAdded = true;
                    }
                }
            }
            // Add all grades to the studentGrades array
            array_push(
                $studentGrades,
                [
                    "Student number" => $content["Student number"],
                    "Course code" => $content["Course code"],
                    "Course year" => $content["Course year"],
                    "Grade" => $content["Grade"],
                    "Number of credits" => $content["Number of credits"]
                ]
            );
            // Check if student is not already added
            if (!$isStudentAdded) {
                // Add the student to the students array
                array_push(
                    $students,
                    [
                        "Student number" => $content["Student number"],
                        "First name" => $content["First name"],
                        "Last name" => $content["Last name"],
                        "DOB" => $content["DOB"]
                    ]
                );
            }
        }

        // Create arrays to store the courses and the result of the course participants
        $courses = [];
        $courseParticipants = [];
        // Go through each row in the uploaded file
        foreach ($contentArray as $content) {
            // Create a variable that says if the course is already added
            $isCourseAdded = false;
            // Check if anything have been added to the courses array
            if ($courses) {
                // Go through already added courses
                foreach ($courses as $key => $addedCourse) {
                    // Check if course is already added
                    if ($addedCourse['Course code'] == $content['Course code']) {
                        // Course already exists
                        $isCourseAdded = true;
                    }
                }
            }
            // Check if course is not already added
            if (!$isCourseAdded) {
                // Add the course to the courses array
                array_push(
                    $courses,
                    [
                        "Course code" => $content["Course code"],
                        "Course name" => $content["Course name"],
                        "Course year" => $content["Course year"],
                        "Course semester" => $content["Course semester"],
                        "Instructor name" => $content["Instructor name"],
                        "Number of credits" => $content["Number of credits"]
                    ]
                );
            }
        }


        // Create the students database file
        $studentsFile = new File("studentsDatabase.csv");
        $studentsFile->createFile($students);

        // Create the grades database file
        $gradesFile = new File("gradesDatabase.csv");
        $gradesFile->createFile($studentGrades);

        // Create the courses database file
        $studentsFile = new File("coursesDatabase.csv");
        $studentsFile->createFile($courses);

        // Echo that the file is successfully uploaded
        echo "<p>File successfully uploaded!</p>";
    }
    ?>

</body>

</html>