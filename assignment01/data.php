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
    if ($_FILES) {
        $name = $_FILES['filename']['name'];
        move_uploaded_file($_FILES['filename']['tmp_name'], $name);
        // Open file
        $file = fopen($name, 'r') or die('Failed to open file!');

        // Read file
        $contentHeaders = fgets($file) or die("Failed!");
        $headerArray = explode(',', $contentHeaders);

        $contentArray = [];
        while (($line = fgets($file)) !== false) {
            $animal = explode(',', $line);
            array_push($contentArray, $animal);
        }
        // Close file
        fclose($file);


        $text = "";
        $first = true;
        foreach ($headerArray as $header) {
            if ($first) {
                $text .= $header;
                $first = false;
            } else {
                $text .= ',' . $header;
            }
        }
        echo $text;

        echo "<table><tr>";
        foreach ($headerArray as $header) {
            echo "<th>$header</th>";
        }
        echo "</tr>";

        foreach ($contentArray as $content) {
            echo "<tr>";
            foreach ($content as $student) {
                echo "<td>$student</td>";
            }
            echo "</tr>";
        }

        echo "</table>";

        echo "<br>File uploaded!<br>";
    }
    ?>




</body>

</html>