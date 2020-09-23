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
    $numberOfStudents = 0;

    print "<p>Number of students: $numberOfStudents</p>";
    ?>


    <!-- Sort students in table by GPA -->
    <table>
        <tr>
            <th>Student number</th>
            <th>First name</th>
            <th>Last name</th>
            <th>DOB</th>
            <th>Total numbers of courses completed</th>
            <th>Total numbers of courses failed</th>
            <th>GPA</th>
            <th>Status</th>
        </tr>
    </table>

</body>
</html>