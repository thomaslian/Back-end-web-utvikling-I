<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
        }
        th, td {
        padding: 5px;
        }
        th {
        text-align: left;
        }
    </style>
</head>
<body>

<?php
// define global variable here for gravitational constant
$gConstant = 6.674E-11;

// create two dimensional array here
$planets = array(
    array("Mercury", 4879, 0.330),
    array("Venus", 12104, 4.87),
    array("Earth", 12756, 5.97),
    array("Mars", 6792, 0.642),
    array("Jupiter", 142984, 1898),
    array("Saturn", 120536, 568),
    array("Uranus", 51118, 86.8),
    array("Neptune", 49528, 102),
);

?>

<?php
/* Write 2 functions. One for calculating surface gravity and the other for calculating escape velocity. Both functions should take only 2 arguments, the Mass and Diameter of the planets.
You should access the global constant G from inside of each function.

Optional : Create 1 more function to populate the rows of your table in a more efficient manner.
Hint : Use dynamic text and concatenation of html tags with php. Be careful of scope.
 */

function calcSurfaceGravity($diameter, $mass) {
    global $gConstant;
    $surfGravity = $gConstant * $mass * 10E24 / pow(($diameter / 2), 2)/10000000;
    return round($surfGravity, 1);
}

function calcEscapeVelocity($diameter, $mass) {
    global $gConstant;
    $escVelocity = sqrt(2 * $gConstant * $mass * 10E24 / ($diameter/2))/100000;
    return round($escVelocity, 2);
}
?>

    <!-- Create your table here -->
    <h1> Planets in the Solar System</h1>

<table style="width:50%">

  <tr>
    <th>Names</th>
    <th>Diameter(km)</th>
    <th>Mass(10<sup>24</sup> kg)</th>
    <th>Gravity(m/s<sup>2</sup>)</th>
    <th>Escape Velocity(km/s)</th>
  </tr>

  <?php 
    foreach ($planets as $planet) {
      print "<tr><td>$planet[0]</td>";
      print "<td>$planet[1]</td>";
      print "<td>$planet[2]</td>";
      print "<td>" . calcSurfaceGravity($planet[1], $planet[2]) . "</td>";
      print "<td>" . calcEscapeVelocity($planet[1], $planet[2]) . "</td></tr>";
    }
  ?>


</table>


</body>
</html>