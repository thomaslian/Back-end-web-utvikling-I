<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>
<?php

$fh = fopen("testfile.txt", 'w') or die ('File creation failed!');
$str = "hello";
fwrite($fh, $str);

?>
</body>
</html>