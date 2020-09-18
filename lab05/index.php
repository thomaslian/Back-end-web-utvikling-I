<?php //upload.php
echo <<<_END
    <html><head><title>Form Upload</title>
    </head><body>
    <form method='post' action='index.php' enctype='multipart/form-data'>
      Select File: <input type='file' name='filename' size='10'>
      <input type='submit' value='Upload'>
    <form>
_END;

if ($_FILES) {
    $name = $_FILES['filename']['name'];
    move_uploaded_file($_FILES['filename']['tmp_name'], $name);
    // Open file
    $file = fopen($name, 'r') or die('Failed!');

    // Read file
    $contentHeaders = fgets($file) or die ("Failed!");
    $headerArray = explode(';', $contentHeaders);

    $contentArray = [];
    while(($line = fgets($file)) !== false) {
      $animal = explode(';', $line);
      array_push($contentArray, $animal);
  }
    // Close file
    fclose($file);

    echo "<table style='border: 1px solid black'><tr style='border: 1px solid black'>";
    foreach($headerArray as $header) {
      echo "<th style='border: 1px solid black'>$header</th>";
    }
    echo "</tr>";

    
    foreach($contentArray as $content) {
      echo "<tr>";
      foreach($content as $animal) {
        echo "<td>$animal</td>";
      }
      echo "</tr>";
    }
    
    echo "</table>";

    echo "<br>File uploaded!<br>";
}
echo '</body></html>';
?>
