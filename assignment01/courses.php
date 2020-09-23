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
    $numberOfUniqueCourses = 0;

    print "<p>Number of students: $numberOfUniqueCourses</p>";
    ?>


    <!-- Sort courses by number of students -->
    <table>
        <tr>
            <th>Course code</th>
            <th>Course name</th>
            <th>Course year</th>
            <th>Course semester</th>
            <th>Instructor name</th>
            <th>Number of credits</th>
            <th>Number of students registered</th>
            <th>Number of students passed</th>
            <th>Number of students failed</th>
            <th>Average grade taken</th>
        </tr>
    </table>

</body>
</html>