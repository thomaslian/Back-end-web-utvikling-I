<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>
<?php

include "Vehicle.php";

echo "Creating a new car object<br>";
$car1 = new Car('BMW');
echo "<pre>";
print_r($car1);
echo "</pre>";

echo "Creating a new truck object<br>";
$truck1 = new Truck('Volvo');
echo "<pre>";
print_r($truck1);
echo "</pre>";

echo "Modifying the number of Tires in truck<br>";
$truck1->overrideNumOfTires(8);
echo "<pre>";
print_r($truck1);
echo "</pre>";

echo Vehicle::$numCars . " Cars <br>";
echo Vehicle::$numTrucks . " Trucks <br>";


?>
</body>
</html>