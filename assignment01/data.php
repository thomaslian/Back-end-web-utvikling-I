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
    require 'File.php';

    include 'Student.php';

    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        // Create a new instance of the uploaded file
        $file = new File($name);
        // Get the content of the file
        $contentArray = $file->getFileContent();

        echo "<table><tr>";
        foreach (array_keys($contentArray[0]) as $header) {
            echo "<th>$header</th>";
        }
        echo "</tr>";


        $students = [];
        $studentGrades = [];
        // Organize students and get values
        foreach ($contentArray as $content) {
            $isStudentAdded = false;
            // Go through already added students
            foreach ($students as $key => $addedStudent) {
                // Check if student is already added
                if ($addedStudent['Student number'] == $content['Student number']) {
                    echo "THIS STUDENT ALREADY EXISTS!";
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


        $studentsFile = new File("studentsDatabase.csv");
        //print_r($studentsFile->getFileContent());
        $studentsFile->createFile($students);

        $gradesFile = new File("gradesDatabase.csv");
        //print_r($gradesFile->getFileContent());
        $gradesFile->createFile($studentGrades);



        // List students in a table
        foreach ($contentArray as $content) {
            echo "<tr>";
            foreach ($content as $key => $stud) {
                echo "<td>$stud</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        echo "<br>File uploaded!<br>";
    }
    ?>




</body>

</html>