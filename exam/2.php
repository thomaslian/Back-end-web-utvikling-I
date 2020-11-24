<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>
<?php

$user = array("Ashley", "Bale", "Shrek", "Blank");
for ($x = 0; $x < count($user) - 1; $x++) {
    if ($user[$x++] == "Shrek")
        continue;
    printf($user[$x]);
}

?>
</body>
</html>