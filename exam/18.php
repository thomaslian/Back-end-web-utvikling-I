<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>

<?php
include "Select.php";

$fruits = array("Banana", "Apple", "Pear");
$planets = array("Mercury", "Venus", "Earth", "Mars", "Jupiter", "Saturn", "Uranus", "Neptune");
$cars = array("BMW", "Jaguar", "Tesla", "Ferrari", "Porsche");
?>

<form>
    <?php
    $select1 = new Select("Fruits", $fruits);
    ?>
</form>

<p>----New Form----</p>

<form action="18.php" method="post">
    <label>
        Name:
        <input type="text" name="name">
    </label>
    <br>
    <label>
        Favorite Planet:
        <?php
        $select1 = new Select("Planets", $planets);
        ?>
    </label>
    <br>
    <label>
        Favorite Car:
        <?php
        $select1 = new Select("Cars", $cars);
        ?>
    </label>
    <br>
    <input type="submit" value="Send" name="favorites">
</form>

<?php
if (isset($_POST['favorites'])) {
    echo "<p>" . sanitizeInput($_POST["name"]) . "'s favorite planet is ". sanitizeInput($_POST["Planets"])  . "</p>";
    echo "<p>" . sanitizeInput($_POST["name"]) . "'s favorite car is ". sanitizeInput($_POST["Cars"]) . "</p>";
}

function sanitizeInput($data)
{
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlentities($data);
    return $data;
}

?>


</body>

</html>