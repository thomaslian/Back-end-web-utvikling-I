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
    require 'classes/File.php';

    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], "data/" . $name);
        // Create a new instance of the uploaded file
        $file = new File($name);
        // Get the content of the file
        $contentArray = $file->getFileContent();

        $students = [];
        $studentGrades = [];
        // Organize students and get values
        foreach ($contentArray as $content) {
            $isStudentAdded = false;
            // Go through already added students
            foreach ($students as $key => $addedStudent) {
                // Check if student is already added
                if ($addedStudent['Student number'] == $content['Student number']) {
                    // Student already exists
                    $isStudentAdded = true;
                }
            }
            // Add grade to studentGrades array
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
            // Add student to students array if not already added
            if (!$isStudentAdded) {
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

        $courses = [];
        $courseParticipants = [];
        // Organize courses and get values
        foreach ($contentArray as $content) {
            $isCourseAdded = false;
            // Go through already added courses
            if ($courses) {
                foreach ($courses as $key => $addedCourse) {
                    // Check if course is already added
                    if ($addedCourse['Course code'] == $content['Course code']) {
                        // Course already exists
                        $isCourseAdded = true;
                    }
                }
            }
            if (!$isCourseAdded) {
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


        // Create the students database
        $studentsFile = new File("studentsDatabase.csv");
        $studentsFile->createFile($students);

        // Create the grades database
        $gradesFile = new File("gradesDatabase.csv");
        $gradesFile->createFile($studentGrades);

        // Create the courses database
        $studentsFile = new File("coursesDatabase.csv");
        $studentsFile->createFile($courses);

        echo "<p>File uploaded!</p>";
    }
    ?>




</body>

</html>